<?php
namespace app\index\controller;


use app\index\controller\Base;
use app\index\model\Admin;
use app\index\validate\LoginValidate;
use think\Request;

class Login
{
    public function index()
    {

        return view('', ['verify_type' =>0]);
    }

    //处理登录
    public function doLogin(Request $request)
    {
        $loginValidate = new LoginValidate();
        if (!$loginValidate->check($request->post())) {
            return ['code' => 0, 'msg' =>$loginValidate->getError()];
        }
        return Admin::checkLogin($request);
    }
    //退出
    public function logout()
    {
        session(null);
        return redirect('/index/login');
    }
}
