<?php

namespace App\Model\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Company extends Model
{
    use InteractsWithMedia;

    protected $table = 'tbl_company';

    protected $primaryKey = 'company_id';

    const CREATED_AT = 'company_created';
    const UPDATED_AT = 'company_updated';
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'company_id', 'company_name', 'company_code', 'company_enable_gst', 'company_force_collect',
        'company_address', 'company_email', 'company_reg_no', 'company_phone', 'company_status', 'is_display'
    ];
}
