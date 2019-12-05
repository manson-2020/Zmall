<?php

namespace app\index\model;

use think\Model;

class Admin extends Model
{
    //关联角色表
    public function role()
    {
        return $this->belongsTo('Role');
    }
    //设置密码
    public function setPasswordAttr($value)
    {
        //return md5(md5($value));
        $password =md5(md5($value));
        return $password;
    }
    //登录验证
    public static function checkLogin($info)
    {
        $username = $info->post('username');
        $password = $info->post('password');
        $admin = self::where(['name' => $username])->find();
        if($admin['password']==md5(md5($password))){
            session('admin', $admin);
            return ['code' => 1, 'msg' => '登录成功', 'url' => '/index/index/index'];
        }
        return ['code' => 2, 'msg' => '账户密码错误'];
    }
    //获取菜单
    public function getMenu()
    {
        $nodes = [];
        $nodes = $this->role->nodes()->column('id');

        return $this->getAdminNodes($nodes);
    }
    //获取管理员列
    public function getAdminNodes($nodeArr = [])
    {
        //超级管理员没有节点数组
        if (session('admin.id') == 1) {
            $nodes = Node::where(['status' => 1])->order('sort')->select();

        } else {
            $nodes = Node::where(['status' => 1])->whereIn('id', $nodeArr)->select();

        }

        return $this->prepareMenu($nodes->toArray());
    }
    //获取菜单
    public function prepareMenu($param)
    {
        $parent = []; //父类
        $child  = []; //子类
        foreach ($param as $key => $vo) {
            if ($vo['pid'] == 0) {
                $vo['href'] = '#';
                $parent[]   = $vo;
            } else {
                $vo['href'] = url($vo['name']); //跳转地址
                $child[]    = $vo;
            }
        }

        foreach ($parent as $key => $vo) {
            foreach ($child as $k => $v) {
                if ($v['pid'] == $vo['id']) {
                    $parent[$key]['child'][] = $v;
                }
            }
        }

        unset($child);
        return $parent;
    }

}
