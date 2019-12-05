<?php

namespace app\index\model;

use think\Model;

class NodeRole extends Model{
    public static function del($role_id){
    	return self::where(['role_id' => $role_id])->delete();
    }
}
