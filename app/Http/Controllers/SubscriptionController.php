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
use App\Model\Subscription;
use Illuminate\Support\Arr;
use App\Model\TenantCompany;
use Illuminate\Http\Request;
use App\Model\FeatureSetting;
use App\Model\SubscriptionLog;
use App\Model\SubscriptionFeature;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Mail\TenantSuccessRegister;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Model\SubscriptionTransaction;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Stancl\Tenancy\Database\Models\Domain;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'], ['except' => ['tenantViewOrder', 'tenantPaySubscription']]);
    }

    public function getSubscription(Request $request)
    {
        if ($request->ajax()) {
            $subscription = Subscription::query();

            if ($request->input('status')) {
                $status = $request->input('status');
                $subscription->where('subscription_status', $status);
            }

            if ($request->input('search')) {
                $search = $request->input('search');
                $subscription->where('subscription_name', 'LIKE', "%{$search}%");
                $subscription->orWhere('subscription_description', 'LIKE', "%{$search}%");
                $subscription->orWhere('subscription_price', 'LIKE', "%{$search}%");
                $subscription->orWhere('subscription_maximum_charge_per_year', 'LIKE', "%{$search}%");
                $subscription->orWhere('subscription_charge_per_kg', 'LIKE', "%{$search}%");
                $subscription->orWhere('subscription_status', 'LIKE', "%{$search}%");
                $subscription->orWhereHas('feature', function($query) use ($search){
                    $query->where('feature_title', 'LIKE', "%{$search}%");
                })->get();
            } else {   
                $subscription->with(['feature']);
            }

            $data = $subscription->get();

            return datatables()->of($data)
                ->addIndexColumn()
                ->editColumn('feature', function($row) {
                    $featureResponse = '';
                    foreach (Arr::get($row, 'feature') as $feature) {
                        $featureResponse .= Arr::get($feature, 'feature_title') . '<br>';
                    }
                    return $featureResponse;
                })
                ->editColumn('subscription_status', function($row) {
                    $subscriptionStatus = ucfirst($row->subscription_status);
                    switch ($row->subscription_status) {
                        case 'active':
                            $status = "<span class='badge badge-primary font-size-11'>{$subscriptionStatus}</span>";
                            break;
                        case 'disable':
                            $status = "<span class='badge badge-warning'>{$subscriptionStatus}</span>";
                            break;
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '';
                    // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>';
                    switch ($row->subscription_status) {
                        case 'active':
                            $actionBtn .= '<a href="javascript:void(0)" class="btn btn-outline-warning btn-sm mr-2 edit-status" data-subscription-name="' . $row->subscription_name . '" data-subscription-id="' . $row->subscription_id . '" data-status="disable">Disable</a>';
                            break;
                        case 'disable':
                            $actionBtn .= '<a href="javascript:void(0)" class="btn btn-outline-primary btn-sm mr-2 edit-status" data-subscription-name="' . $row->subscription_name . '" data-subscription-id="' . $row->subscription_id . '" data-status="active">Active</a>';
                            break;
                    }
                    $actionBtn .= '<a href="' . route('subscription.edit.view', ['subscription_id' => $row->subscription_id]) .'" class="btn btn-outline-success btn-sm mr-2">Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'subscription_status', 'feature'])
                ->make(true);
        }
    }

    public function index(Request $request)
    {
        return view('subscription/index');
    }

    public function add(Request $request)
    {

        $feature = FeatureSetting::get();
        return view('subscription/add', compact('feature'));
    } 

    public function save(Request $request)
    {
        $validator = null;
        $validator = Validator::make($request->all(), [
            'subscription_name' => 'required',
            'subscription_description' => 'required',
            'subscription_maximum_charge_per_year' => 'required|numeric|min:0',
            'subscription_price' => 'required|numeric|min:0',
            'subscription_charge_per_kg' => 'required|numeric|min:0',
        ])->setAttributeNames([
            'subscription_name' => 'Subscription Name',
            'subscription_description' => 'Subscription Description',
            'subscription_maximum_charge_per_year' => 'Maximum Charge Per Year',
            'subscription_price' => 'Subscription Price',
            'subscription_charge_per_kg' => 'Charge Per Kg',
        ]);

        if (count($validator->errors())) {
            $error_message = $validator->messages()->all();
            $error_highlited = $validator->messages()->keys();
            $response_message = '';
            $highlitedField = array();
            foreach($error_message as $key => $message) {
                $response_message .= '<i class="pr-2 text-danger fa fa-info-circle"></i>';
                $response_message .= $message . '<br>';
            }
            return [
                'status' => 500,
                'message' => $response_message,
                'highlited_field' => $error_highlited
            ];
        } else {
            $subscription = Subscription::create(
                [
                    'subscription_name' => $request->input('subscription_name'),
                    'subscription_description' => $request->input('subscription_description'),
                    'subscription_maximum_charge_per_year' => $request->input('subscription_maximum_charge_per_year'),
                    'subscription_price' => $request->input('subscription_price'),
                    'subscription_charge_per_kg' => $request->input('subscription_charge_per_kg'),
                ]
            );

            foreach($request->input('feature') as $feature) {
                $subscriptionFeature = SubscriptionFeature::create(
                    [
                        'subscription_id' => $subscription->subscription_id,
                        'feature_id' => $feature
                    ]
                );
            }

            $subscriptionLog = SubscriptionLog::create(
                [
                    'subscription_id' => $subscription->subscription_id,
                    'user_id' => Auth::id(),
                    'action' => 'Create New Subscription',
                    'data' => $subscription,
                    'feature' => json_encode($request->input('feature')),
                ]
            );

            return [
                'status' => 200,
                'message' => 'Create Subscription Plan Successfully!',
            ];
        }
    }

    public function storeEdit(Request $request)
    {
        $validator = null;
        $validator = Validator::make($request->all(), [
            'subscription_id' => 'required',
            'subscription_name' => 'required',
            'subscription_description' => 'required',
            'subscription_maximum_charge_per_year' => 'required|numeric|min:0',
            'subscription_price' => 'required|numeric|min:0',
            'subscription_charge_per_kg' => 'required|numeric|min:0',
        ])->setAttributeNames([
            'subscription_id' => 'Subscription Data',
            'subscription_name' => 'Subscription Name',
            'subscription_description' => 'Subscription Description',
            'subscription_maximum_charge_per_year' => 'Maximum Charge Per Year',
            'subscription_price' => 'Subscription Price',
            'subscription_charge_per_kg' => 'Charge Per Kg',
        ]);

        if (count($validator->errors())) {
            $error_message = $validator->messages()->all();
            $error_highlited = $validator->messages()->keys();
            $response_message = '';
            $highlitedField = array();
            foreach($error_message as $key => $message) {
                $response_message .= '<i class="pr-2 text-danger fa fa-info-circle"></i>';
                $response_message .= $message . '<br>';
            }
            return [
                'status' => 500,
                'message' => $response_message,
                'highlited_field' => $error_highlited
            ];
        } else {
            $subscription = Subscription::findOrFail($request->input('subscription_id'));
            $subscription->subscription_name = $request->input('subscription_name');
            $subscription->subscription_description = $request->input('subscription_description');
            $subscription->subscription_maximum_charge_per_year = $request->input('subscription_maximum_charge_per_year');
            $subscription->subscription_price = $request->input('subscription_price');
            $subscription->subscription_charge_per_kg = $request->input('subscription_charge_per_kg');
            $subscription->save();


            SubscriptionFeature::where('subscription_id', $subscription->subscription_id)->delete();

            foreach($request->input('feature') as $feature) {
                $subscriptionFeature = SubscriptionFeature::create(
                    [
                        'subscription_id' => $subscription->subscription_id,
                        'feature_id' => $feature
                    ]
                );
            }

            $subscriptionLog = SubscriptionLog::create(
                [
                    'subscription_id' => $subscription->subscription_id,
                    'user_id' => Auth::id(),
                    'action' => 'Edit Subscription',
                    'data' => $subscription,
                    'feature' => json_encode($request->input('feature')),
                ]
            );

            return [
                'status' => 200,
                'message' => 'Edit Subscription Plan Successfully!',
            ];
        }
    }

    public function edit($subscription_id)
    {
        $subscription = Subscription::with(['feature'])->findOrFail($subscription_id);
        $feature = FeatureSetting::get();
        return view('subscription/edit', compact(['feature', 'subscription']));
    }

    public function changeStatus(Request $request)
    {

        $subscription = Subscription::findOrFail($request->input('subscription_id'));
        $subscription->subscription_status = $request->input('subscription_status');
        $subscription->save();

        $feature = SubscriptionFeature::where('subscription_id', $subscription->subscription_id)->pluck('feature_id');

        $subscriptionLog = SubscriptionLog::create(
            [
                'subscription_id' => $subscription->subscription_id,
                'user_id' => Auth::id(),
                'action' => 'Change Status',
                'data' => $subscription,
                'feature' => $feature
            ]
        );

        return [
            'status' => 200,
            'message' => 'Change subscription successfully!'
        ];
    } 

    public function tenantViewOrder($tenant_company_id, $expired_time) {
        $tenant_company_id = Crypt::decryptString($tenant_company_id);
        $expired_time = Crypt::decryptString($expired_time);

        $currentTime = Carbon::now();
        if ($currentTime > $expired_time) {
            abort(404);
        }
        $tenant = TenantCompany::with(['subscription', 'subscription.feature'])->findOrFail($tenant_company_id);

        if (Arr::get($tenant, 'subscription_first_time_status') == 'paid') {
            abort(404);
        }
        $date = $currentTime->format('d M Y');
        return view('order-summary', compact(['tenant', 'date']));

    }

    public function tenantPaySubscription(Request $request) {
        $tenant_company_id = $request->input('tenant_id');

        $tenant = TenantCompany::with(['subscription', 'pic_user'])->findOrFail($tenant_company_id);

        if (Arr::get($tenant, 'subscription_first_time_status') == 'paid') {
            return [
                'status' => 500,
                'message' => 'Your subscription already active! You can proceed to login page.'
            ];
        }

        $subscription_price = Arr::get($tenant, 'subscription.subscription_price', 0);
        $subscription_price_per_kg = 0;
        $subscription_additional_price = 0;
        $transaction_month = Carbon::now()->format('m');
        $transaction_year = Carbon::now()->format('Y');
        $grandTotalPrice = $subscription_price + $subscription_price_per_kg + $subscription_additional_price;

        // Transaction
        $subscriptionTransaction = SubscriptionTransaction::create([
            'transaction_number' => generateTransactionNumber(),
            'subscription_id' => Arr::get($tenant, 'subscription_id'),
            'tenant_id' => Arr::get($tenant, 'id'),
            'subscription_price' => Arr::get($tenant, 'subscription.subscription_price'),
            'subscription_price_per_kg' => 0,
            'subscription_additional_price' => 0,
            'subscription_grand_total_price' => Arr::get($tenant, 'subscription.subscription_price'),
            'transaction_month' => $transaction_month,
            'transaction_year' => $transaction_year,
            'transaction_cc_token' => 'token',
            'transaction_status' => 'Paid'
        ]);

        // Change Status Paid
        $tenant->subscription_first_time_status = 'paid';
        $tenant->save();

        // Run query below in queue for better performance

        // Add to tenancy function to create tenant
        $tenancy = Tenant::create([
            'id' => Arr::get($tenant, 'tenant_code'),
            'subscription_id' => Arr::get($tenant, 'subscription_id')
        ]);
        
        tenancy()->initialize($tenancy);
        $user = User::create([
            'user_email' => Arr::get($tenant, 'pic_user.user_email'),
            'password' => Arr::get($tenant, 'pic_user.password'),
            'user_fullname' => Arr::get($tenant, 'pic_user.user_fullname'),
            'user_gender' => Arr::get($tenant, 'pic_user.user_gender'),
            'user_nationality' => Arr::get($tenant, 'pic_user.user_nationality'),
            'user_status' => 'active',
            'user_mobile' => Arr::get($tenant, 'pic_user.user_mobile'),
            'user_join_date' => Arr::get($tenant, 'pic_user.user_join_date'),
            'user_type_id' => 1,
            'user_language' => 'en',
            'user_unique_code' => Arr::get($tenant, 'pic_user.user_unique_code'),
            'user_cdate' => date('d-m-y h:i:s'),
            'user_udate' => date('d-m-y h:i:s'),
        ]);

        $setting_data = Setting::updateOrCreate([
            'setting_slug' => 'company_name'
        ], [
            'setting_value' => Arr::get($tenant, 'company_name'),
        ]);
        $setting_data = Setting::updateOrCreate([
            'setting_slug' => 'company_address'
        ], [
            'setting_value' => Arr::get($tenant, 'company_address'),
        ]);
        $setting_data = Setting::updateOrCreate([
            'setting_slug' => 'company_email'
        ], [
            'setting_value' => Arr::get($tenant, 'company_email'),
        ]);
        $setting_data = Setting::updateOrCreate([
            'setting_slug' => 'company_reg_no'
        ], [
            'setting_value' => Arr::get($tenant, 'company_reg_no'),
        ]);
        $setting_data = Setting::updateOrCreate([
            'setting_slug' => 'company_phone'
        ], [
            'setting_value' => Arr::get($tenant, 'company_phone_no'),
        ]);
        tenancy()->end();

        // Send invoice to email
        Mail::to($tenant->company_email)->send(new TenantSuccessRegister($tenant));

        return [
            'status' => 200,
            'message' => 'Registration Completed!',
        ];
    }

    public function log(Request $request)
    {
        $subscription = Subscription::get();

        return view('subscription/log', compact(['subscription']));
    }

    public function getSubscriptionLog(Request $request)
    {
        if ($request->ajax()) {
            $collectionModule = FeatureSetting::get();
            $subscriptionLog = SubscriptionLog::query();

            if ($request->input('subscription_id')) {
                $subscription_id = $request->input('subscription_id');
                $subscriptionLog->where('subscription_id', $subscription_id);
            }

            $subscriptionLog->with(['subscription', 'user']);
            $subscriptionLog->orderBy('created_at', 'DESC');
            $data = $subscriptionLog->get();

            
            return datatables()->of($data)
                ->addIndexColumn()
                ->editColumn('subscription', function($row) {
                    $dataLog = json_decode(Arr::get($row, 'data'), true);
                    $subscription = Arr::get($dataLog, 'subscription_name');
                    return $subscription;
                })
                ->editColumn('data', function($row) {
                    $subscription = Arr::get($row, 'subscription.subscription_name', '');
                    $dataLog = json_decode(Arr::get($row, 'data'), true);
                    $subscriptionDesc = Arr::get($dataLog, 'subscription_description');
                    $subscriptionMax = Arr::get($dataLog, 'subscription_maximum_charge_per_year');
                    $subscriptionPrice = Arr::get($dataLog, 'subscription_price');
                    $subscriptionChargePerKg = Arr::get($dataLog, 'subscription_charge_per_kg');
                    $subscriptionStatus = Arr::get($dataLog, 'subscription_status');

                    $subscriptionStatus = ucfirst($subscriptionStatus);
                    $status = '';
                    switch ($subscriptionStatus) {
                        case 'Active':
                            $status = "<span class='badge badge-primary font-size-11'>{$subscriptionStatus}</span>";
                            break;
                        case 'Disable':
                            $status = "<span class='badge badge-warning'>{$subscriptionStatus}</span>";
                            break;
                    }

                    // Return Data
                    $returnData = '';
                    $returnData .= 'Description : ' . $subscriptionDesc . '<br>';
                    $returnData .= 'Maximum Charge Per Year : RM ' . $subscriptionMax . '<br>';
                    $returnData .= 'Price : RM ' . $subscriptionPrice . '<br>';
                    $returnData .= 'Charge Per Kg : RM ' . $subscriptionChargePerKg . '<br>';
                    $returnData .= 'Status : ' . $status . '<br>';
                    return $returnData;
                })
                ->editColumn('user', function($row) {
                    $user = Arr::get($row, 'user.user_fullname', '');
                    return $user;
                })
                ->editColumn('feature', function($row) use ($collectionModule){
                    $data = $collectionModule->whereIn('feature_id', json_decode(Arr::get($row, 'feature', '[]'), true));
                    $enable_feature = '';
                    foreach ($data as $key => $feature) {
                        $enable_feature .= Arr::get($feature, 'feature_title') . '<br>';
                    }
                    return $enable_feature;
                })
                ->addColumn('logging_date', function($row){
                    $logging_date = new Carbon(Arr::get($row, 'created_at'));
                    return $logging_date->format('d/m/Y g:i A');
                })
                ->rawColumns(['data', 'feature'])
                ->make(true);
        }
    }
}