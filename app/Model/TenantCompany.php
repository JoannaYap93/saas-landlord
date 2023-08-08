<?php

namespace App\Model;

use App\Model\SubscriptionFeature;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class TenantCompany extends Model
{
    protected $table = 'tbl_tenant_company';

    protected $fillable = [
        'tenant_name',
        'tenant_code',
        'referral_code',
        'subscription_id',
        'company_name',
        'company_email',
        'company_address',
        'company_reg_no',
        'company_phone_no',
        'tenant_status',
        'subscription_first_time_status',
        'created_by_user_id'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class,'subscription_id','subscription_id');
    }

    public function pic_user()
    {
        return $this->hasOne(TenantUser::class,'tenant_id', 'id');
    }

    public function tenancy()
    {
        return $this->hasOne(Tenant::class, 'id', 'tenant_code');
    }
}
