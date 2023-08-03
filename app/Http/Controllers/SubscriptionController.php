<?php

namespace App\Http\Controllers;

use Session;
use DateTime;
use DataTables;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Model\Subscription;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Model\FeatureSetting;
use App\Model\SubscriptionFeature;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Stancl\Tenancy\Database\Models\Domain;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
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

        return [
            'status' => 200,
            'message' => 'Change subscription successfully!'
        ];
    } 
}