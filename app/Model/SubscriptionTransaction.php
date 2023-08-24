<?php

namespace App\Model;

use App\Model\SubscriptionFeature;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class SubscriptionTransaction extends Model
{
    protected $table = 'tbl_subscription_transaction';

    protected $fillable = [
        'transaction_number',
        'subscription_id',
        'tenant_id',
        'subscription_price',
        'subscription_price_per_kg',
        'subscription_additional_price',
        'subscription_grand_total_price',
        'transaction_month',
        'transaction_year',
        'transaction_response',
        'transaction_cc_token',
        'transaction_status',
        'transaction_type'
    ];

    public function subscription_plan()
    {
        return $this->belongsTo('App\Model\Subscription', 'subscription_id');
    }
    
    public function tenant()
    {
        return $this->belongsTo('App\Model\TenantCompany', 'tenant_id');
    }
}
