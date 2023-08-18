<?php

namespace App\Model;

use App\Model\User;
use App\Model\Subscription;
use App\Model\FeatureSetting;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class SubscriptionLog extends Model
{
    protected $table = 'tbl_subscription_log';

    protected $fillable = [
        'id',
        'subscription_id',
        'user_id',
        'action',
        'data',
        'feature',
        'created_at',
        'updated_at',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class,'subscription_id','subscription_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }
}
