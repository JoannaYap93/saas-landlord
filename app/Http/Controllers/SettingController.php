<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Setting;
use Session;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listing(Request $request){
        $search = array();
        $perpage = 15;
        $records = Setting::get_record($search, $perpage);
        return view('setting/listing', compact('records','search'));
    }

    public function edit(Request $request, $setting_id){
        $validator = null;
        $post = $setting_detail =  Setting::find($setting_id);
       
        if(!$setting_detail){
            Session::flash('fail_msg', 'Invalid Roles, Please try again later.');
            return redirect('/');
        }
        if($setting_detail->is_editable == 0){
            Session::flash('fail_msg', 'Error, Setting can\'t be edit'); 
            return redirect()->route('setting_listing');
        }
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'setting_value' => 'required',
            ])->setAttributeNames([
                'setting_value' => 'Setting Value',
            ]);
            if (!$validator->fails()) {
                $setting_detail->update([
                    'setting_value' => $request->input('setting_value')
                ]);
                Session::flash('success_msg', 'Successfully updated Setting.'); 
                return redirect()->route('setting_listing');
            }
            $post = (object) $request->all();
        }
        return view('setting/form', [
            'submit'=> route('setting_edit',$setting_id),
            'title'=> 'Edit',
            'post'=> $post,
        ])->withErrors($validator);
    }
}
