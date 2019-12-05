<?php
namespace app\index\controller;

use app\index\controller\Base;
use app\index\model\Admin;
use app\index\validate\UpdatePasswordValidate;
use app\index\model\Config;
use think\Request;

class Index extends Base
{
    public function index()
    {
        return view('/index', [
            'admin' => session('admin'),
            'web_site_copy' => Config::where(['name' => 'web_site_copy'])->value('value')
        ]);
    }
    //列表页
    public function indexPage()
    {
        $map['status'] = ['status','neq',5];
        $info = [
            'web_server' => $_SERVER['SERVER_SOFTWARE'],
            'onload'     => ini_get('upload_max_filesize'),
            'phpversion' => phpversion(),
        ];
        return view('index', [
            'info' => $info,
        ]);
    }
    //修改密码显示页面
    public function editpwd()
    {
        return view();
    }
    //修改密码
    public function updatepwd(Request $request, UpdatePasswordValidate $validate)
    {
        $param=$request->post();
        if ($validate->check($request->post())) {
            return ['code' => 0, 'msg' => $validate->getError()];
        }
        $user = Admin::get(session('admin.id'));
//       ($password,$admin['password']
        if (md5(md5($param['old_password'])) != $user->password) {
            return ['code' => -1, 'msg' => '旧密码错误'];
        } else {
            $user->password = $request->post('password');
            $user->save();
            return ['code' => 1, 'msg' => '修改成功'];
        }
    }
}
