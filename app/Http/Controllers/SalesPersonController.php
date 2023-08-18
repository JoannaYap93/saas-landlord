<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Model\Tenant\Company;
use App\Model\Tenant\CompanyLand;

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
        // if ($request->ajax()) {
            $user = User::query();
            $user->role('Sales Advisor');
            $user->with(['user_tenant']);
            // $user->hasRole('Sales Advisor');
            // $tenantCompany->with(['tenancy', 'subscription', 'pic_user']);

            // if ($request->input('search')) {
            //     $search = $request->input('search');
            //     $tenantCompany->where('tenant_name', 'LIKE', "%{$search}%");
            //     $tenantCompany->orWhere('tenant_code', 'LIKE', "%{$search}%");
            //     $tenantCompany->orWhere('company_name', 'LIKE', "%{$search}%");
            //     $tenantCompany->orWhere('referral_code', 'LIKE', "%{$search}%");
            //     $tenantCompany->orWhereHas('subscription', function ($query) use ($search) {
            //         $query->where('subscription_name', 'LIKE', "%{$search}%");
            //     });
            //     $tenantCompany->orWhereHas('pic_user', function ($query) use ($search) {
            //         $query->where('user_email', 'LIKE', "%{$search}%");
            //         $query->orWhere('user_fullname', 'LIKE', "%{$search}%");
            //     });
            // }

            $data = $user->get();

            // echo json_encode($data);
            // die;
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('tenant', function($row){
                    $tenant = Arr::get($row, 'user_tenant');
                    $tenantResponse = '';
                    foreach($tenant as $key => $tenant) {
                        if ($tenant->subscription_first_time_status == 'unpaid') {
                            continue;
                        }

                        $tenantResponse .= '<b>' . $tenant->tenant_name . '</b><br>';
                        tenancy()->initialize($tenant->tenant_code);
                            $user = User::count();
                            $companyLand = CompanyLand::count();
                            $company = Company::count();
                            $tenantResponse .=  'User - ' . $user . '<br>'; 
                            $tenantResponse .=  'Land - ' . $companyLand . '<br>'; 
                            $tenantResponse .=  'Company - ' . $company . '<br>'; 
                        tenancy()->end();
                    }
                    return $tenantResponse;
                })
                ->addColumn('status', function($row){
                    $actionBtn = '';
                    return $actionBtn;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'status', 'tenant'])
                ->make(true);
        // }
    }
}
