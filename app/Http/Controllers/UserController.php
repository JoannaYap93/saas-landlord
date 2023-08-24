<?php

namespace App\Http\Controllers;

use Session;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Model\User; 
use App\Model\UserType;
use App\Model\EventDate;
use App\Model\Transaction;
use App\Model\UserPlatform;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function dashboard(Request $request)
    {
        return view('dashboard');
    }

    public function getUser (Request $request)
    {
        if ($request->ajax()) {
            $user = User::query();
            $user->where('user_id', '!=', 1);
            if ($request->input('search')) {
                $search = $request->input('search');
                $user->where(function($query) use ($search) {
                    $query->where('user_email', 'LIKE', "%{$search}%");
                    $query->orWhere('user_fullname', 'LIKE', "%{$search}%");
                });
            }

            if ($request->input('status')) {
                $status = $request->input('status');
                $user->where(function($query) use ($status) {
                    $query->where('user_status', $status);
                });
            }

            if ($request->input('role')) {
                $role = $request->input('role');
                $user->where(function($query) use ($role) {
                    $query->whereHas('roles', function ($queryRole) use ($role) {
                        $queryRole->where('id', $role);
                    });
                });
            } else {
                $user->where(function($query) {
                    $query->whereHas('roles', function ($queryRole) {
                        $queryRole->where('name','!=', 'Sales Advisor');
                    });
                });
            }

            if ($request->input('gender')) {
                $gender = $request->input('gender');
                $user->where(function($query) use ($gender){
                    $query->where('user_gender', $gender);
                });
            }

            $data = $user->get();

            return datatables()->of($data)
                ->addIndexColumn()
                ->editColumn('user_fullname', function ($row) {
                    $tenant = '<b>' . Arr::get($row, 'user_fullname') . '</b><br>' . Arr::get($row, 'user_email');
                    return $tenant;
                })
                ->addColumn('user_detail', function($row){
                    $detail = '';
                    return $detail;
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
                            $action = "<a href='" . route('user_edit', $row->user_id) . "' class='btn btn-sm btn-outline-primary waves-effect waves-light'>Edit</a>
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
    
    public function listing(Request $request)
    {
        return view('user/listing', [
            'user_role_sel'=> UserType::get_user_role_sel(),
            'user_status_sel'=> ['' => 'Please select status', 'active' => 'Active', 'suspend' => 'Suspend', 'pending' => 'Pending'],
            'user_gender_sel'=> ['' => 'Please select gender', 'Male' => 'Male', 'Female ' => 'Female'],
        ]);
    }

    public function add(Request $request)
    {
        $roles = Role::where('name', '!=', 'Sales Advisor')->get();
        return view('user/form', compact('roles'));
    }

    public function store_add(Request $request) {
        $validator = null;
        $validator = Validator::make($request->all(), [
            'user_email' => 'required|unique:tbl_user,user_email',
            'user_role_id' => 'required',
            'password' => ['required', 'min:8'],
            'user_fullname' => 'required',
            'user_nric' => 'required',
            'user_nationality' => 'required',
            'user_gender' => 'required',
            'user_dob' => 'required',
            'user_mobile' => 'required|unique:tbl_user,user_mobile',
        ])->setAttributeNames([
            'user_email' => 'Email',
            'user_role_id' => 'User Role',
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
            $user_role_id = $request->input('user_role_id');
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
                'message' => 'Create User Successfully!',
            ];

        }

       
        // $post = (object) $request->all();
    }

    public function edit($user_id)
    {
        $roles = Role::where('name', '!=', 'Sales Advisor')->get();
        $user = User::find($user_id);
        $user_role = optional($user->roles)->first();
        return view('user/edit', compact(['roles', 'user', 'user_role']));
    }

    public function assign_permission(Request $request, $user_id)
    {
        $validator = null;
        $post = $user =  User::find($user_id);
        if(!$user){
            Session::flash('fail_msg', 'Invalid User, Please try again later.');
            return redirect('/');
        }
        $user_role = optional($user->roles)->first();
        $role_permissions = $user_role ? Role::findById($user_role->id)->permissions()->pluck('name')->toArray() : [];
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'role_id' => 'required',
            ])->setAttributeNames([
                'role_id' => 'User Role',
            ]);
            
            if (!$validator->fails()) {
                $submit_type = $request->input('submit');
                $role_id = $request->input('role_id');
                switch ($submit_type) {
                    case 'update':
                        $assign_permission = array();
                        if ($request->input('permissions') && $role_permissions) {
                            foreach ($request->input('permissions') as $permission) {
                                if (!in_array($permission, $role_permissions)) {
                                    $assign_permission[] = $permission;
                                }
                            }
                        }
                        $user->syncPermissions($assign_permission);
                        Session::flash('success_msg', 'Successfully updated '. $user->user_email .' permission.'); 
                        return redirect()->route('user_listing');
                        break;
                    case 'reset':
                        $role = Role::findById($role_id);
                        $user->syncRoles($role->name);
                        Session::flash('success_msg', 'Successfully reset '. $user->user_email .' permission.'); 
                        return redirect()->route('assign_permission', $user_id);
                        break;
                }
              
            }
            $post = (object) $request->all();
        }

        return view('user/assign_permission', [
            'submit'=>route('assign_permission',$user_id),
            'title'=> 'Assign Permission',
            'user'=> $user,
            'user_role'=> $user_role,
            'roles'=> Role::where('name', '!=', 'Sales Advisor')->get(),
            'permissions'=> Permission::orderBy('group_name', 'asc')->get(),
            'user_permission'=> $user->getAllPermissions() ?  $user->getAllPermissions()->pluck('name')->toArray() : [],
            'role_permissions'=> $role_permissions,
        ])->withErrors($validator);
    }

    public function status(Request $request)
    {
        $action = $request->input('action');
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $data['user_status'] = $action;
        $data['is_deleted'] = $action == 'activate' ? 0 : 1;
        $user->update($data);
        Session::flash('success_msg', "Successfully {$action} {$user->user_email} user.");
        return redirect()->route('user_listing');
    }

    public function profile(Request $request)
    {
        $validator = null;
        $user_id = Auth::id();
        $post = $user =  User::find($user_id);
        if(!$user){
            Session::flash('fail_msg', 'Invalid User, Please try again later.');
            return redirect('/');
        }
        if($request->isMethod('post')){
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
            if (!$validator->fails()) {
                $update_detail = [
                    'user_email' => $request->input('user_email'),
                    'user_fullname' =>  $request->input('user_fullname'),
                    'user_nric' => $request->input('user_nric'),
                    'user_nationality' =>$request->input('user_nationality'),
                    'user_gender' => $request->input('user_gender'),
                    'user_dob' => $request->input('user_dob'),
                    'user_mobile' => $request->input('user_mobile'),
                    'user_udate' => now(),
                    'user_address' => $request->input('user_address') ? $request->input('user_address') : '',
                    'user_address2' => $request->input('user_address2') ? $request->input('user_address2') : '',
                    'user_city' => $request->input('user_city') ? $request->input('user_city') : '',
                    'user_state' => $request->input('user_state') ? $request->input('user_state') : '',
                    'user_postcode' => $request->input('user_postcode') ? $request->input('user_postcode') : '',
                ];
                $image = $request->file('user_profile_photo');
                if ($image) {
                    $path = 'upload/user_profile_photo';
                    $name =  $user_id;
                    $update_detail['user_profile_photo'] = $image->storeAs($path, $name . '.' . $image->getClientOriginalExtension());
                }
                $post->update($update_detail);
                Session::flash('success_msg', 'Successfully updated my profile.'); 
                return redirect()->route('user_profile');
            }
            $post = (object) $request->all();
            unset($post->user_profile_photo);
        }
        return view('user/profile', [
            'submit'=>route('user_profile'),
            'title'=> 'Profile',
            'post'=> $post,
            'user_gender_sel'=> array('' => 'Please select gender', 'Male' => 'Male', 'Female ' => 'Female'),
        ])->withErrors($validator);
    }

    public function change_password(Request $request)
    {
        $validator = null;
        $user_id = Auth::id();
        $post = $user =  User::find($user_id);
        if(!$user){
            Session::flash('fail_msg', 'Invalid User, Please try again later.');
            return redirect('/');
        }
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'old_password' => 'required|min:8',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|same:new_password'
            ])->setAttributeNames([
                'old_password' => 'Old Password',
                'new_password' => 'New Password',
                'confirm_password' => 'Confirm Password'
            ]);
            if (!$validator->fails()) {
                $data = $request->all();
                if (Hash::check($request->old_password, $user->password)) {
                    $data['password'] = bcrypt($request->new_password);
                    $data['user_udate'] = now();
                    unset($data['old_password']);
                    unset($data['new_password']);
                    unset($data['confirm_password']);
    
                    $user->update($data);
    
                    Session::flash('success_msg', 'Successfully update my password.');
                    return redirect()->route('user_change_password');
                } else {
                    Session::flash('fail_msg', 'The Old Password confirmation does not match.');
                }
            }
            $post = (object) $request->all();
        }
        return view('user/change_password', [
            'submit'=>route('user_change_password'),
            'title'=> 'Change Password',
            'post'=> $post,
        ])->withErrors($validator);
    }

    public function store_edit(Request $request) {
        $user_id = $request->input('user_id');
        $validator = Validator::make($request->all(), [
            'user_email' => "required|unique:tbl_user,user_email,{$user_id},user_id",
            'user_role_id' => 'required',
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
            'user_role_id' => 'User Role',
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
            $user_role_id = $request->input('user_role_id');
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
                'message' => 'Edit User Successfully!',
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
    // public function ajax_get_user_details(Request $request)
    // {
    //     $user_id = $request->input('user_id');
    //     $user = User::find($user_id);
    //     $data['user_fullname'] = $user->user_fullname;
    //     $data['user_gender'] = $user->user_gender;
    //     $data['user_mobile'] = $user->user_mobile;
    //     $data['user_nric'] = $user->user_nric;
    //     $data['user_nationality'] = $user->user_nationality;
    //     return response()->json(['data' => $data, 'status' => true]);
    // }
}
