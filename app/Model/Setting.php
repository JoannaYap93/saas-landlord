<?php

namespace App\Model;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{

    use InteractsWithMedia;
    protected $table = 'tbl_setting';
    protected $primaryKey = 'setting_id';
    public $timestamps = false;

    protected $fillable = [
        'setting_slug', 'setting_type', 'setting_value', 'setting_description', 'is_editable'
    ];

    public static function get_record($search, $perpage){
        $query = Setting::query();
        $result = $query->paginate($perpage);
        return $result;
    }
    
    public static function get_by_slug($setting_slug) {
        $setting = Setting::query();
        $setting->where('setting_slug', $setting_slug);
        $result = optional($setting->first())->setting_value;

        return $result;
    }
}