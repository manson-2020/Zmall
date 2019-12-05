<?php
namespace app\index\validate;

use think\Validate;

class LoginValidate extends Validate
{
    protected $rule =   [
        'username'  => 'require|min:5',
        'password'   => 'require|min:6', 
    ];
    
    protected $message  =   [
        'username.require' => '名称必须',
        'username.min'     => '名称不能小于5个字符',
        'password'   => '密码必须',
        'password.min'  => '密码不得小于6个字符',
    ];
    
}



?>