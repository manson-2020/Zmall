<?php

namespace app\index\controller;

use app\index\model\Admin;
use app\index\model\Order;
use app\index\model\OrderDetails;
use think\Controller;
use think\facade\Hook;

class Base extends Controller
{

    public function __construct()
    {
        
        parent::__construct();

        Hook::listen('auth_check');


        $this->assign([
            'menu'     => session('admin')->getMenu(),

            'username' => session('username'),

            'portrait' => session('portrait'),

            'rolename' => session('rolename'),

        ]);
    }

}
