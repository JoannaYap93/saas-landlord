<?php

namespace App\Model\Tenant;

use Illuminate\Database\Eloquent\Model;

class CompanyLand extends Model
{
    protected $table = 'tbl_company_land';

    protected $primaryKey = 'company_land_id';

    const CREATED_AT = 'company_land_created';
    const UPDATED_AT = 'company_land_updated';
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'company_land_name', 'company_land_category_id', 'company_id', 'company_land_code', 'company_bank_id', 'company_land_total_tree', 'company_land_total_acre',
        'is_overwrite_budget', 'overwrite_budget_per_tree'
    ];

    public function company_land_category()
    {
        return $this->belongsTo('App\Model\Tenant\CompanyLandCategory', 'company_land_category_id');
    }

}
