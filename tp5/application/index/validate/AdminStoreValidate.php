<?php
namespace app\index\validate;

use think\Validate;

class AdminStoreValidate extends Validate
{
	protected $rule = [
		'name' => 'require|min:5|unique:admin',
        'email' => 'require|email|unique:admin',
        'password' => 'require|min:6',

        'status'  => 'require|integer'
	];
	protected $message = [
		'name.require' => '用户名必须填写',
		'name.min' => '用户名不得小于五个字符',
		'name.unique' => '用户名已存在',
		'email.require' => '邮箱必须填写',
		'email.unique' => '邮箱已存在',
		'password.require' => '密码必须填写',
		'password.min' => '密码不得小于留个字符',

		'status.require' => '状态必须',
		'status.integer' => '状态数据有无'
	];
 
}



?>


