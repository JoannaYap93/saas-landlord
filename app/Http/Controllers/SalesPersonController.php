<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Tenant;
use Illuminate\Support\Arr;
use App\Model\TenantCompany;
use Illuminate\Http\Request;
use App\Model\Tenant\Company;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Model\Tenant\CompanyLand;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Model\SubscriptionTransaction;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SalesPersonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('sales_person/listing');
    }

    public function getSalesPerson(Request $request)
    {
        if ($request->ajax()) {
            $user = User::query();
            $user->role('Sales Advisor');
            $user->with(['user_tenant']);

            if ($request->input('search')) {
                $search = $request->input('search');
                $user->where(function($query) use ($search) {
                    $query->where('user_email', 'LIKE', "%{$search}%");
                    $query->orWhere('user_fullname', 'LIKE', "%{$search}%");
                    $query->orWhere('referral_code', 'LIKE', "%{$search}%");
                    $query->orWhereHas('user_tenant', function ($queryTenant) use ($search) {
                        $queryTenant->where('tenant_name', 'LIKE', "%{$search}%");
                        $queryTenant->orWhere('tenant_code', 'LIKE', "%{$search}%");
                        $queryTenant->orWhere('company_name', 'LIKE', "%{$search}%");
                        $queryTenant->orWhere('company_email', 'LIKE', "%{$search}%");
                    });
                });
            }

            if ($request->input('status')) {
                $status = $request->input('status');
                $user->where('user_status', $status);
            }

            $data = $user->get();

            return datatables()->of($data)
                ->addIndexColumn()
                ->editColumn('user_fullname', function ($row) {
                    $tenant = '<b>' . Arr::get($row, 'user_fullname') . '</b><br>' . Arr::get($row, 'user_email');
                    return $tenant;
                })
                ->addColumn('tenant', function($row){
                    $tenant = Arr::get($row, 'user_tenant');
                    $tenantResponse = '';
                    foreach($tenant as $key => $tenant) {
                        if ($tenant->subscription_first_time_status == 'unpaid') {
                            continue;
                        }
                        $tenantResponse .= '<div class="mb-2">';
                        $tenantResponse .= '<b>' . $tenant->tenant_name . '</b>';
                        $tenantResponse .= '<a href="javascript:void(0)" class="ml-2 edit btn btn-outline-success btn-sm tenant-detail" data-tenant_code="' . $tenant->tenant_code . '">View Detail</a>';
                        $tenantResponse .= '<a href="' . env('TENANT_URL') . '/' . $tenant->tenant_code . '/sales-person-login/' . Auth::id() . '" class="ml-2 edit btn btn-outline-primary btn-sm bypass-login" target="_blank">Login</a>';
                        $tenantResponse .= '</div>';
                    }
                    return $tenantResponse;
                })
                ->addColumn('status', function($row){
                    switch ($row->user_status) {
                        case 'active':
                            $status = "<span class='badge badge-primary font-size-11'>" . ucfirst($row->user_status) . "</span>";
                            break;
                        case 'suspend':
                            $status = "<span class='badge badge-danger'>" . ucfirst($row->user_status) . "</span>";
                            break;
                        case 'pending':
                            $status = "<span class='badge badge-warning'>" . ucfirst($row->user_status) . "</span>";
                            break;
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $action = '';
                    switch ($row->user_status) {
                        case 'active':
                            $action = "<a href='" . route('sales-person.edit', $row->user_id) . "' class='btn btn-sm btn-outline-primary waves-effect waves-light'>Edit</a>
                                    <a href='javascript:void(0);' data-status='suspend' data-user-name='$row->user_fullname' data-id='$row->user_id' class='btn btn-sm btn-outline-danger waves-effect waves-light change-status-user'>Suspend</a>";
                            break;
                        case 'suspend':
                            $action = "<a href='javascript:void(0);' data-status='active' data-user-name='$row->user_fullname' data-id='$row->user_id' class='btn btn-sm btn-outline-success waves-effect waves-light change-status-user'>Activate</a>";
                            break;
                    }
                    return $action;
                })
                ->rawColumns(['user_fullname', 'action', 'status', 'tenant'])
                ->make(true);
        }
    }

    public function tenantUserDatatable(Request $request)
    {
        if ($request->ajax()) {
            $tenantCode = $request->input('tenant');
            $tenant = Tenant::find($tenantCode);

            tenancy()->initialize($tenant);
            $tenantUser = User::query();
            $tenantUser = $tenantUser->get();
            tenancy()->end();

            $data = $tenantUser;

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    $status = '';
                    switch ($row->user_status) {
                        case 'active':
                            $status = "<span class='badge badge-primary font-size-11'>" . ucfirst($row->user_status) . "</span>";
                            break;
                        case 'suspend':
                            $status = "<span class='badge badge-danger'>" . ucfirst($row->user_status) . "</span>";
                            break;
                        case 'pending':
                            $status = "<span class='badge badge-warning'>" . ucfirst($row->user_status) . "</span>";
                            break;
                    }
                    return $status;
                })
                ->rawColumns(['status'])
                ->make(true);
        }
    }
    
    public function tenantCompanyDatatable(Request $request)
    {
        if ($request->ajax()) {
            $tenantCode = $request->input('tenant');
            $tenant = Tenant::find($tenantCode);

            tenancy()->initialize($tenant);
            $tenantCompany = Company::query();
            $tenantCompany = $tenantCompany->get();
            tenancy()->end();

            $data = $tenantCompany;

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    $status = '';
                    switch ($row->company_status) {
                        case 'active':
                            $status = "<span class='badge badge-primary font-size-11'>" . ucfirst($row->company_status) . "</span>";
                            break;
                        case 'suspend':
                            $status = "<span class='badge badge-danger'>" . ucfirst($row->company_status) . "</span>";
                            break;
                        case 'pending':
                            $status = "<span class='badge badge-warning'>" . ucfirst($row->company_status) . "</span>";
                            break;
                    }
                    return $status;
                })
                ->rawColumns(['status'])
                ->make(true);
        }
    }

    public function tenantLandDatatable(Request $request)
    {
        if ($request->ajax()) {
            $tenantCode = $request->input('tenant');
            $tenant = Tenant::find($tenantCode);

            tenancy()->initialize($tenant);
            $tenantCompanyLand = CompanyLand::query();
            $tenantCompanyLand->with(['company_land_category']);
            $tenantCompanyLand = $tenantCompanyLand->get();
            tenancy()->end();

            $data = $tenantCompanyLand;

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    $status = '';
                    switch ($row->company_status) {
                        case 'active':
                            $status = "<span class='badge badge-primary font-size-11'>" . ucfirst($row->company_status) . "</span>";
                            break;
                        case 'suspend':
                            $status = "<span class='badge badge-danger'>" . ucfirst($row->company_status) . "</span>";
                            break;
                        case 'pending':
                            $status = "<span class='badge badge-warning'>" . ucfirst($row->company_status) . "</span>";
                            break;
                    }
                    return $status;
                })
                ->addColumn('category', function($row){
                    return Arr::get($row, 'company_land_category.company_land_category_name');
                })
                ->addColumn('land_detail', function($row){
                    $detail = '';
                    $detail .= 'Total Tree : ' . Arr::get($row, 'company_land_total_tree', 0) . '<br>';
                    $detail .= 'Total Acre : ' . Arr::get($row, 'company_land_total_acre', 0) . '<br>';
                    return $detail;
                })
                ->rawColumns(['status', 'land_detail'])
                ->make(true);
        }
    }
    
    public function tenantInvoiceDatatable(Request $request)
    {
        if ($request->ajax()) {
            $tenantCode = $request->input('tenant');
            $tenant = TenantCompany::with(['transaction', 'transaction.subscription_plan'])->where('tenant_code', $tenantCode)->first();
            $transaction = Arr::get($tenant, 'transaction', []);
            $data = $transaction;
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="' .route('preview.invoice', ['encrypt_number' => Crypt::encryptString($row->transaction_number)]). '" target="_blank" class="ml-2 edit btn btn-outline-success btn-sm">Invoice</a><br>';
                    return $btn;
                })
                ->addColumn('grand_total', function ($row){
                    $grand_total = Arr::get($row, 'subscription_grand_total_price', 0);
                    $response = 'RM ' . number_format($grand_total, 2);
                    return $response;
                })
                ->addColumn('subscription', function ($row){
                    $subscriptionPlan = Arr::get($row, 'subscription_plan.subscription_name', 0);
                    return $subscriptionPlan;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function previewInvoice($encrypt_number)
    {
        $transaction_number = Crypt::decryptString($encrypt_number);
        $transaction = SubscriptionTransaction::with(['subscription_plan', 'subscription_plan.feature', 'tenant'])->where('transaction_number', $transaction_number)->first();
        return view('invoice.invoice', compact('transaction'));
    }

    public function exportInvoice($encrypt_number)
    {
        $transaction_number = Crypt::decryptString($encrypt_number);
        $transaction = SubscriptionTransaction::where('transaction_number', $transaction_number)->first();
        if (!$transaction) {
            return view('pages-404');
        }

        if ($transaction) {

            $pdf = Pdf::loadView('invoice.view', [
                'transaction' => $transaction
            ]);

            return $pdf->stream('Invoice #' . $transaction->transaction_number . '.pdf');
            // return view('invoice.view', ['invoice'=> $invoice]);
            // return $pdf->stream();
        } else {
            return view('pages-404');
        }
    }

    public function add(Request $request)
    {
        return view('sales_person/add');
    }

    public function store(Request $request)
    {
        $validator = null;
        $validator = Validator::make($request->all(), [
            'user_email' => 'required|unique:tbl_user,user_email',
            'password' => ['required', 'min:8'],
            'user_fullname' => 'required',
            'user_nric' => 'required',
            'user_nationality' => 'required',
            'user_gender' => 'required',
            'user_dob' => 'required',
            'user_mobile' => 'required|unique:tbl_user,user_mobile',
        ])->setAttributeNames([
            'user_email' => 'Email',
            'password' => 'Password',
            'user_fullname' => 'Fullname',
            'user_nric' => 'NRIC',
            'user_nationality' => 'Nationality',
            'user_gender' => 'Gender',
            'user_dob' => 'Date of Birth',
            'user_mobile' => 'Mobile No',
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
            if ($request->input('referral_code')) {
                $referralCode = $request->input('referral_code');
            } else {
                $referralCode = generateReferralCode();
            }
            
            $user_type_id = 1;
            $user_role_id = 2;
            $user = User::create([
                'user_email' => $request->input('user_email'),
                'password' => bcrypt($request->input('password')),
                'user_fullname' =>  $request->input('user_fullname'),
                'user_nric' => $request->input('user_nric'),
                'user_nationality' =>$request->input('user_nationality'),
                'user_gender' => $request->input('user_gender'),
                'user_dob' => $request->input('user_dob'),
                'user_mobile' => $request->input('user_mobile'),
                'user_type_id' =>  $user_type_id ,
                'user_logindate' => now(),
                'user_cdate' => now(),
                'user_udate' => now(),
                'user_join_date' => now(),
                'user_ip' => '',
                'user_profile_photo' => '',
                'user_platform_id' => '1',
                'user_address' => $request->input('user_address') ? $request->input('user_address') : '',
                'user_address2' => $request->input('user_address2') ? $request->input('user_address2') : '',
                'user_city' => $request->input('user_city') ? $request->input('user_city') : '',
                'user_state' => $request->input('user_state') ? $request->input('user_state') : '',
                'user_postcode' => $request->input('user_postcode') ? $request->input('user_postcode') : '',
                'referral_code' => $referralCode
                
            ]);
            if ($user_type_id == 1 && $user_role_id > 0) {
                $role = Role::findById($user_role_id);
                if($role){
                    $user->syncRoles($role->name);
                }
            }

            return [
                'status' => 200,
                'message' => 'Create Salesperson Successfully!',
            ];

        }
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('sales_person/edit', compact(['user']));
    }

    public function store_edit(Request $request) {
        $user_id = $request->input('user_id');
        $validator = Validator::make($request->all(), [
            'user_email' => "required|unique:tbl_user,user_email,{$user_id},user_id",
            'user_fullname' => 'required',
            'user_nric' => 'required',
            'user_nationality' => 'required',
            'user_gender' => 'required',
            'user_dob' => 'required',
            'user_mobile' => "required|unique:tbl_user,user_mobile,{$user_id},user_id",
            'user_profile_photo' => 'image|mimes:jpeg,png,jpg|max:2048'
        ])->setAttributeNames([
            'user_email' => 'Email',
            'user_fullname' => 'Fullname',
            'user_nric' => 'NRIC',
            'user_nationality' => 'Nationality',
            'user_gender' => 'Gender',
            'user_dob' => 'Date of Birth',
            'user_mobile' => 'Mobile No',
            'user_profile_photo' => 'User Profile Photo'
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
            $user = User::find($user_id);
            $user_type_id = 1;
            $user_role_id = 2;
            $update_detail = [
                'user_email' => $request->input('user_email'),
                'user_fullname' =>  $request->input('user_fullname'),
                'user_nric' => $request->input('user_nric'),
                'user_nationality' =>$request->input('user_nationality'),
                'user_gender' => $request->input('user_gender'),
                'user_dob' => $request->input('user_dob'),
                'user_mobile' => $request->input('user_mobile'),
                'user_type_id' =>  $user_type_id ,
                'user_udate' => now(),
                'user_address' => $request->input('user_address') ? $request->input('user_address') : '',
                'user_address2' => $request->input('user_address2') ? $request->input('user_address2') : '',
                'user_city' => $request->input('user_city') ? $request->input('user_city') : '',
                'user_state' => $request->input('user_state') ? $request->input('user_state') : '',
                'user_postcode' => $request->input('user_postcode') ? $request->input('user_postcode') : '',
            ];
            if ($request->input('password') != '') {
                $update_detail['password'] = bcrypt($request->input('password'));
            }
            $user->update($update_detail);
            if ($user_type_id == 1 && $user_role_id > 0) {
                $role = Role::findById($user_role_id);
                if($role){
                    $user->syncRoles($role->name);
                }
            }else{
                $user->syncRoles([]);
            }

            return [
                'status' => 200,
                'message' => 'Edit Salesperson Successfully!',
            ];
        }
    }

    public function changeStatus(Request $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        $user->user_status = $request->input('user_status');
        $user->save();

        return [
            'status' => 200,
            'message' => 'Change status successfully!'
        ];
    } 
}
