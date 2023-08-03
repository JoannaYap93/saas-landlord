<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use EventDate;
// use Spatie\Activitylog\Traits\LogsActivity;

class UserPlatform extends Model
{
    // use LogsActivity;

    protected $table = 'tbl_user_platform';
    protected $primaryKey = 'user_platform_id';
    public $timestamps = false;

    protected $fillable = [
        'user_platform_name'
    ];
}
