<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class FeatureSetting extends Model
{
    protected $table = 'tbl_feature_setting';
    protected $primaryKey = 'feature_id';
    public $timestamps = false;

    protected $fillable = [
        'feature_slug',
        'feature_title',
        'feature_group',
        'feature_icon',
        'feature_extra_charge',
    ];

    public function subscription()
    {
        return $this->belongsToMany(Subscription::class,'tbl_subscription_has_feature','feature_id','subscription_id');
    }
}
