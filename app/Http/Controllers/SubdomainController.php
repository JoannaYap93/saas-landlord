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
use App\Model\UserType;
use App\Model\EventDate;
use App\Model\Transaction;
use App\Model\UserPlatform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            if ($request->input('search')) {
                $search = $request->input('search');
                $data = Domain::where('domain', 'LIKE', "%{$search}%")->orWhere('domain_code', 'LIKE', "%{$search}%")->orWhere('tenant_id', 'LIKE', "%{$search}%")->get();
            } else {
                $data = Domain::get();
            }
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    $actionBtn = '';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function listing(Request $request)
    {
        return view('subdomain_setup/listing');
    }

    public function add_view(Request $request)
    {
        return view('subdomain_setup/add');
    }

    public function add(Request $request)
    {
        $validator = null;
        $validator = Validator::make($request->all(), [
            'tenant_name' => 'required|unique:tenants,id',
            'subdomain' => 'required|unique:domains,domain',
            'full_name' => 'required',
            'gender' => 'required',
            'unique_code' => 'required',
            'user_email' => 'required',
            'nationality' => 'required',
            'password' => 'required',
        ])->setAttributeNames([
            'tenant_name' => 'Tenant Name',
            'subdomain' => 'Subdomain',
            'full_name' => 'Full Name',
            'gender' => 'Gender',
            'unique_code' => 'Unique Code',
            'user_email' => 'User Email',
            'nationality' => 'User Nationality',
            'password' => 'Password',
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

            $tenant = Tenant::create([
                    'id' => $request->input('tenant_name'),
                    'referral_code' => $request->input('referral_code'),
            ]);

            $domain_code = strtoupper($request->input('subdomain')) . date('s');

            $tenant->domains()->create([
                'domain' => $request->input('subdomain') . '.' . env('HUAXIN_BACKEND_URL'),
                'domain_code' => $domain_code
            ]);

            tenancy()->initialize($tenant);
            
            $user = User::create([
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
            ]);

            return [
                'status' => 200,
                'message' => 'Add Subdomain Successfully!'
            ];
        }
    }
}
