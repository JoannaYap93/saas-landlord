<?php

namespace App\Model;

use App\Model\Subscription;
use App\Model\FeatureSetting;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class SubscriptionFeature extends Model
{
    protected $table = 'tbl_subscription_has_feature';

    protected $fillable = [
        'id',
        'subscription_id',
        'feature_id',
    ];
}
