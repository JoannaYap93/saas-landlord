<?php

namespace App\Model;

use App\Model\SubscriptionFeature;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class TenantUser extends Model
{
    protected $table = 'tbl_tenant_user';
    protected $primaryKey = 'tenant_user_id';

    const CREATED_AT = 'user_cdate';
    const UPDATED_AT = 'user_udate';
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'user_email', 
        'user_original_password',
        'password', 
        'user_fullname', 
        'user_profile_photo', 
        'user_nric', 
        'user_nationality', 
        'user_gender', 
        'user_address', 
        'user_address2', 
        'user_city',
        'user_state', 
        'user_postcode', 
        'user_dob', 
        'user_status', 
        'user_logindate', 
        'user_cdate', 
        'user_udate', 
        'user_ip', 
        'user_mobile', 
        'user_join_date', 
        'user_admin_skin',
        'email_verified_at', 
        'user_type_id',
        'user_language',
        'user_unique_code',
        'user_token',
        'user_wallet_amount',
        'tenant_id',
        'deleted_at',
    ];
}
