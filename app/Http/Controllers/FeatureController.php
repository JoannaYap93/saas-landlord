<?php

namespace App\Http\Controllers;

use Session;
use DateTime;
use DataTables;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Model\FeatureSetting;
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
use Stancl\Tenancy\Database\Models\Domain;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function getFeature(Request $request)
    {
        if ($request->ajax()) {
            $featureSetting = FeatureSetting::query();

            if ($request->input('status')) {
                $status = $request->input('status');
                $featureSetting->where('feature_status', $status);
            }

            if ($request->input('search')) {
                $search = $request->input('search');
                $featureSetting->where('feature_title', 'LIKE', "%{$search}%");
                $featureSetting->orWhere('feature_group', 'LIKE', "%{$search}%");
                $featureSetting->orWhere('feature_extra_charge', 'LIKE', "%{$search}%");
            }

            $data = $featureSetting->get();
            
            return datatables()->of($data)
                ->addIndexColumn()
                ->editColumn('feature_status', function($row) {
                    $featureStatus = ucfirst($row->feature_status);
                    switch ($row->feature_status) {
                        case 'active':
                            $status = "<span class='badge badge-primary font-size-11'>{$featureStatus}</span>";
                            break;
                        case 'disable':
                            $status = "<span class='badge badge-warning'>{$featureStatus}</span>";
                            break;
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '';
                    // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>';
                    switch ($row->feature_status) {
                        case 'active':
                            $actionBtn .= '<a href="javascript:void(0)" class="btn btn-outline-warning btn-sm mr-2 edit-status" data-module-name="'. $row->feature_title .'" data-feature-status="disable" data-feature-id="'. $row->feature_id .'" >Disable</a>';
                            break;
                        case 'disable':
                            $actionBtn .= '<a href="javascript:void(0)" class="btn btn-outline-primary btn-sm mr-2 edit-status" data-module-name="'. $row->feature_title .'" data-feature-status="active" data-feature-id="'. $row->feature_id .'" >Active</a>';
                            break;
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'feature_status'])
                ->make(true);
        }
    }

    public function index(Request $request)
    {
        return view('feature/index');
    }

    public function changeStatus(Request $request)
    {
        $feature = FeatureSetting::findOrFail($request->input('feature_id'));
        $feature->feature_status = $request->input('feature_status');
        $feature->save();

        return [
            'status' => 200,
            'message' => 'Change status successfully!'
        ];
    } 
}