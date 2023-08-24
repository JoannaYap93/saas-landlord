<?php

namespace App\Model\Tenant;


use Illuminate\Database\Eloquent\Model;

class CompanyLandCategory extends Model
{
    protected $table = 'tbl_company_land_category';

    protected $primaryKey = 'company_land_category_id';

    const CREATED_AT = 'company_land_category_created';
    const UPDATED_AT = 'company_land_category_updated';
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'company_land_category_name', 'company_land_category_created',
        'company_land_category_updated', 'is_deleted', 'company_farm_id'
    ];

    public function company_farm()
    {
        return $this->belongsTo(CompanyFarm::class, 'company_farm_id');
    }
}
