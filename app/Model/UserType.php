<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class UserType extends Model
{
    protected $table = 'tbl_user_type';
    protected $primaryKey = 'user_type_id';

    public static function get_user_type(){
        $user_type = UserType::get();
        return $user_type;
    }

    public static function get_user_type_sel(){
        $user_type = UserType::get();
        $temp[''] = 'Please select type';
        foreach($user_type as $type){
            $temp[$type->user_type_id] = $type->user_type_name;
        }
        return $temp;
    }

    public static function get_user_role_sel(){
        $user_role = Role::where('name', '!=', 'Sales Advisor')->get();
        $temp[''] = 'Please select role';
        foreach($user_role as $role){
            $temp[$role->id] = $role->name;
        }
        return $temp;
    }

    public static function getUserRole () {
        $user_role = Role::get();
        return $user_role;
    }
}
