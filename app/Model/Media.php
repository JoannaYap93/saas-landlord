<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    protected $table = 'media';

    public static function generate_temp_media_from_string($image,$extension){
        $tmpDir = sys_get_temp_dir();
        $temp_file = tempnam($tmpDir, $extension);
        if($extension == 'jpeg' || $extension == 'jpg'){
            imagejpeg($image, $temp_file);
        }else{
            imagepng($image, $temp_file);
        }

        return $temp_file;
    }

}
