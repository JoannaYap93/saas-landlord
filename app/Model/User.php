<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use DB;
use Illuminate\Support\Str;
use App\Notifications\ResetPassword;
use Carbon\Carbon;
// use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;

class User extends Authenticatable
{
    // use Notifiable, HasRoles, LogsActivity;
    use HasRoles, Notifiable;

    protected $table = 'tbl_user';

    protected $primaryKey = 'user_id';

    const CREATED_AT = 'user_cdate';
    const UPDATED_AT = 'user_udate';
    protected $dateFormat = 'Y-m-d H:i:s';

    // protected static $logAttributes = ['*'];
    // protected static $logAttributesToIgnore = ['user_udate'];
    // protected static $logName = 'user';
    // protected static $logOnlyDirty = true;
    // protected static $submitEmptyLogs = false;

    protected $fillable = [
        'user_type_id', 'user_email', 'password', 'user_fullname', 'user_profile_photo', 'user_nric', 'user_nationality', 'user_gender', 'user_address', 'user_address2', 'user_city', 'user_state', 'user_postcode', 'user_dob', 'user_status', 'user_logindate', 'user_cdate', 'user_udate', 'user_ip', 'is_deleted', 'user_mobile', 'user_join_date', 'user_admin_skin', 'user_unique_code'
    ];

    protected $hidden = [
        'password', 'user_remember_token'
    ];

    public static function get_record($search, $perpage)
    {
        $user = User::query();

        if (@$search['freetext']) {
            $freetext = $search['freetext'];
            $user->where(function ($q) use ($freetext) {
                $q->where('tbl_user.user_email', 'like', '%' . $freetext . '%')->orWhere('tbl_user.user_mobile', 'like', '%' . $freetext . '%')->orWhere('tbl_user.user_fullname', 'like', '%' . $freetext . '%');
            });
        }
        if (@$search['user_status']) {
            $user = $user->where('tbl_user.user_status', $search['user_status']);
        }
        if (@$search['user_type_id']) {
            $user = $user->where('tbl_user.user_type_id', $search['user_type_id']);
        }
        if (@$search['user_gender']) {
            $user = $user->where('tbl_user.user_gender', $search['user_gender']);
        }
        $user->with('user_type');
        $user->leftJoin('tbl_user_model_has_role as umhs', 'tbl_user.user_id', '=', 'umhs.model_id');
        $user->leftJoin('tbl_user_role as ur', 'umhs.role_id', '=', 'ur.id');
        if (@$search['user_role_id']) {
            $user = $user->where('umhs.role_id', $search['user_role_id']);
        }
        $user->orderBy('user_cdate', 'DESC');
        return $user->paginate($perpage, array('tbl_user.*', 'ur.name as user_role_name'));
    }

    public static function get_all_customer_by_email_sel()
    {
        $users = User::where('is_deleted', 0)->where('user_status', 'active')->get();
        $temp[''] = 'Please select user email';
        foreach ($users as $user) {
            $temp[$user->user_id] = $user->user_email;
        }
        return $temp;
    }
   
    public function user_type()
    {
        return $this->belongsTo('App\Model\UserType', 'user_type_id');
    }

    public function getEmailForPasswordReset()
    {
        return $this->user_email;
    }

    public function routeNotificationFor($driver)
    {
        if (method_exists($this, $method = 'routeNotificationFor' . Str::studly($driver))) {
            return $this->{$method}();
        }

        switch ($driver) {
            case 'database':
                return $this->notifications();
            case 'mail':
                return $this->user_email;
            case 'nexmo':
                return $this->user_mobile;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
    public function getRememberTokenName()
    {
        return 'user_remember_token';
    }

    public function getFullNameAttribute()
    {
        return ucwords($this->user_fullname);
    }

    public function getFullAddressAttribute()
    {
        $address_1 = ucwords($this->user_address);
        $address_2 = ucwords($this->user_address2);
        $city = ucwords($this->user_city);
        $state = ucwords($this->user_state);
        $postcode = ucwords($this->user_postcode);
        $full_address = sprintf('%s,<br>%s,<br>%s,<br>%s,<br>%s', $address_1, $address_2, $postcode, $city, $state);
        return $full_address;
    }
}
