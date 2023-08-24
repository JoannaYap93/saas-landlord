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

    public function listing(Request $request)
    {
        $perpage = 15;

        if ($request->isMethod('post')) {
            $submit_type = $request->input('submit');
            switch ($submit_type) {
                case 'search':
                    session(['filter_setting' => [
                        'freetext' => $request->input('freetext'),
                    ]]);
                    break;
                case 'reset':
                    session()->forget('filter_setting');
                    break;
            }
        }
        $search = session('filter_setting') ?? array();

        return view('setting.listing', [
            'submit' => route('setting_listing'),
            'records' => Setting::get_record($search, $perpage),
            'search' => $search
        ]);
    }

    public function edit(Request $request, $setting_id)
    {

        $setting = Setting::find($setting_id);
        $validation = null;

        if ($request->isMethod('post')) {
            $validation = Validator::make($request->all(), [
                'setting_value' => 'required',
            ])->setAttributeNames([
                'setting_value' => 'Setting Value'
            ]);
            if (!$validation->fails()) {
                if ($setting->setting_type == 'file') {
                    if ($request->file('setting_value')) {
                        $setting->clearMediaCollection('setting');
                        $setting->addMediaFromRequest('setting_value')->toMediaCollection('setting');
                        if ($setting->hasMedia('setting')) {
                            $value = $setting->getFirstMediaUrl('setting');
                        } else {
                            $value = 'image';
                        }
                    }
                } else {
                    $value = $request->input('setting_value') ?? '';
                }

                $setting->update([
                    'setting_value' => $value,
                ]);

                return redirect()->route('setting_listing')->with('success_msg', 'Setting ' . $request->input('setting_slug') . ' updated');
            }
        }

        return view('setting.form', [
            'submit' => route('setting_edit', $setting_id),
            'post' => $setting,
            'edit' => true,
            'type' => 'Edit',
            'title' => 'Edit',
        ])->withErrors($validation);
    }
}
