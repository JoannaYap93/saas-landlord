<?php

namespace App\Http\Controllers;

use Session;
use DateTime;
use DataTables;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Tenant;
use App\Model\Setting;
use App\Model\UserType;
use App\Model\EventDate;
use App\Model\TenantUser;
use App\Model\Transaction;
use App\Model\Subscription;
use App\Model\UserPlatform;
use Illuminate\Support\Arr;
use App\Model\TenantCompany;
use Illuminate\Http\Request;
use App\Model\FeatureSetting;
use App\Mail\TenantPaymentLink;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Stancl\Tenancy\Database\Models\Domain;

class SubdomainController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function getSubdomain(Request $request)
    {
        if ($request->ajax()) {
            $tenantCompany = TenantCompany::query();
            $tenantCompany->with(['tenancy', 'subscription', 'pic_user']);

            if ($request->input('search')) {
                $search = $request->input('search');
                $tenantCompany->where('tenant_name', 'LIKE', "%{$search}%");
                $tenantCompany->orWhere('tenant_code', 'LIKE', "%{$search}%");
                $tenantCompany->orWhere('company_name', 'LIKE', "%{$search}%");
                $tenantCompany->orWhere('referral_code', 'LIKE', "%{$search}%");
                $tenantCompany->orWhereHas('subscription', function ($query) use ($search) {
                    $query->where('subscription_name', 'LIKE', "%{$search}%");
                });
                $tenantCompany->orWhereHas('pic_user', function ($query) use ($search) {
                    $query->where('user_email', 'LIKE', "%{$search}%");
                    $query->orWhere('user_fullname', 'LIKE', "%{$search}%");
                });
            }

            $data = $tenantCompany->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->editColumn('subscription', function($row){
                    return Arr::get($row, 'subscription.subscription_name');
                })
                ->editColumn('tenant_status', function($row) {
                    $tenantStatus = ucfirst($row->tenant_status);
                    switch ($row->tenant_status) {
                        case 'active':
                            $status = "<span class='badge badge-primary font-size-11'>{$tenantStatus}</span>";
                            break;
                        case 'disable':
                            $status = "<span class='badge badge-warning'>{$tenantStatus}</span>";
                            break;
                    }
                    return $status;
                })
                ->editColumn('subscription_first_time_status', function($row) {
                    $firstTimeStatus = ucfirst($row->subscription_first_time_status);
                    switch ($row->subscription_first_time_status) {
                        case 'paid':
                            $status = "<span class='badge badge-primary font-size-11'>{$firstTimeStatus}</span>";
                            break;
                        case 'unpaid':
                            $status = "<span class='badge badge-warning'>{$firstTimeStatus}</span>";
                            break;
                    }
                    return $status;
                })
                ->editColumn('pic_user', function($row){
                    $userName = Arr::get($row, 'pic_user.user_fullname');
                    $userEmail = Arr::get($row, 'pic_user.user_email');
                    $picUser = "{$userName}<span class='small text-muted mb-1'> - {$userEmail}</span>";
                    return $picUser;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-outline-warning btn-sm overwrite-feature" data-tenant_id="' . $row->id . '">Feature List</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'pic_user', 'subscription_first_time_status', 'tenant_status'])
                ->make(true);
        }
    }

    public function listing(Request $request)
    {
        return view('subdomain_setup/listing');
    }

    public function add_view(Request $request)
    {
        
        $subscription = Subscription::where('subscription_status', 'active')->get();
        return view('subdomain_setup/add', compact('subscription'));
    }

    public function add(Request $request)
    {
        $validator = null;
        $validator = Validator::make($request->all(), [
            'tenant_name' => 'required|unique:tenants,id',
            'tenant_code' => 'required|unique:tbl_tenant_company,tenant_code|regex:/^[a-zA-Z]+$/u',
            'full_name' => 'required',
            'gender' => 'required',
            'referral_code' => 'sometimes|exists:tbl_user,referral_code',
            'unique_code' => 'required',
            'user_email' => 'required|email',
            'nationality' => 'required',
            'password' => 'required',
            'company_name' => 'required',
            'company_address' => 'required',
            'company_email' => 'required|email',
            'company_phone_no' => 'required',
            'company_reg_no' => 'required',
            'subscription_id' => 'required|exists:tbl_subscription,subscription_id',
        ],[
            'tenant_code.regex' => 'Tenat Code Not Allow Special Character'
        ])->setAttributeNames([
            'tenant_name' => 'Tenant Name',
            'tenant_code' => 'Tenant Code',
            'full_name' => 'Full Name',
            'gender' => 'Gender',
            'unique_code' => 'Unique Code',
            'user_email' => 'User Email',
            'nationality' => 'User Nationality',
            'password' => 'Password',
            'company_name' => 'Company Name',
            'company_address' => 'Company Address',
            'company_email' => 'Company Email',
            'company_phone_no' => 'Company Phone Number',
            'company_reg_no' => 'Company Registration Number',
            'subscription_id' => 'Subscription Plan'
        ]);

        if (count($validator->errors())) {
            $error_message = $validator->messages()->all();
            $response_message = '';
            foreach($error_message as $message) {
                $response_message .= '<i class="pr-2 text-danger fa fa-info-circle"></i>';
                $response_message .= $message . '<br>';
            }
            return [
                'status' => 500,
                'message' => $response_message
            ];
        } else {

            // Store data to temporary table
            $tenantCompany = TenantCompany::create([
                'tenant_name' => $request->input('tenant_name'),
                'tenant_code' => $request->input('tenant_code'),
                'referral_code' => $request->input('referral_code'),
                'subscription_id' => $request->input('subscription_id'),
                'company_name' => $request->input('company_name'),
                'company_email' => $request->input('company_email'),
                'company_address' => $request->input('company_address'),
                'company_reg_no' => $request->input('company_reg_no'),
                'company_phone_no' => $request->input('company_phone_no'),
                'created_by_user_id' => Auth::id()
            ]);

            // Store User in company tenant user
            $user = TenantUser::create([
                'user_email' => $request->input('user_email'),
                'password' => Hash::make($request->input('password')),
                'user_fullname' => $request->input('full_name'),
                'user_gender' => $request->input('gender'),
                'user_nationality' => $request->input('nationality'),
                'user_status' => 'active',
                'user_mobile' => '0',
                'user_join_date' => date('d-m-y h:i:s'),
                'user_type_id' => 1,
                'user_language' => 'en',
                'user_unique_code' => $request->input('unique_code'),
                'user_cdate' => date('d-m-y h:i:s'),
                'user_udate' => date('d-m-y h:i:s'),
                'tenant_id' => $tenantCompany->id
            ]);
            
            // Subscription Transaction

            $tenant_company_id = $tenantCompany->id;
            $expiredDate = Carbon::now()->addHours(48);
            
            // Send Email
            Mail::to($tenantCompany->company_email)->send(new TenantPaymentLink($tenantCompany, $expiredDate));

            // Send email for view plan
            return [
                'status' => 200,
                'message' => 'Add Tenant Successfully!'
            ];
        }
    }

    public function retreiveOverWriteData(Request $request)
    {
        $tenantCompany = TenantCompany::with(['subscription', 'subscription.feature'])->where('id', $request->input('tenant_id'))->first();

        if ($tenantCompany) {
            $overwriteFeature = json_decode(Arr::get($tenantCompany, 'overwrite_feature', '[]'), true);
            $featureSubscription = Arr::get($tenantCompany, 'subscription.feature');
            $featureSubsId = $featureSubscription->pluck('feature_id')->toArray();
            $featureCollection = FeatureSetting::get();
            $featureListing = '';
            $subscriptionFeature = '';
            foreach ($featureCollection as $key => $feature) {
                $button = '';

                if (in_array($feature->feature_id, $featureSubsId)) {
                    $subscriptionFeature .= "
                    <div class='card col-sm-4 text-center' style='box-shadow: unset !important'>
                        <div class='card-body'>
                            <i class='$feature->feature_icon mb-4' style='font-size:50px'></i>
                            <h5 class='card-title'>$feature->feature_title</h5>
                            <p class='card-text'>$feature->feature_group</p>
                        </div>
                    </div>";
                } else {
                    if (in_array($feature->feature_slug, $overwriteFeature)) {
                        $checkbox = "<div class='feature-check'>
                            <input type='checkbox' id='feature-$feature->feature_id' class='additional-checkbox' value='$feature->feature_slug' name='additional_feature[]' checked>
                            <label for='feature-$feature->feature_id'>Active</label>
                        </div>";
                    } else {
                        $checkbox = "<div class='feature-check'>
                            <input type='checkbox' id='feature-$feature->feature_id' class='additional-checkbox' value='$feature->feature_slug' name='additional_feature[]'>
                            <label for='feature-$feature->feature_id'>Active</label>
                        </div>";
                    }
                    $featureListing .= "
                    <div class='card col-sm-4 text-center' style='box-shadow: unset !important'>
                        <div class='card-body'>
                            <i class='$feature->feature_icon mb-4' style='font-size:50px'></i>
                            <h5 class='card-title'>$feature->feature_title</h5>
                            <p class='card-text'>$feature->feature_group</p>
                            $checkbox
                        </div>
                    </div>";
                }
            }
            
            return [
                'status' => 200,
                'tenant' => $tenantCompany,
                'subscription' => Arr::get($tenantCompany, 'subscription'),
                'subscription_feature' => $subscriptionFeature,
                'feature_listing' => $featureListing,
            ];   
        } else {
            return [
                'status' => 404
            ];
        }
    }

    public function saveAdditionalFeature(Request $request)
    {
        $tenant = TenantCompany::findOrFail($request->input('tenant_id'));
        $tenant->overwrite_feature = $request->input('additional_feature');
        $tenant->save();

        return [
            'status' => 200,
            'message' => 'Save Additional Feature Successfully!',
        ];
    }
}
