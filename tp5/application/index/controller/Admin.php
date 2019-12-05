<?php

namespace app\index\controller;

use app\index\model\Admin as AdminModel;
use app\index\model\Config;
use app\index\model\Role;
use app\index\validate\AdminStoreValidate;
use app\index\validate\AdminUpdateValidate;
use think\Request;

class Admin extends Base
{
    //查询列表
    public function index(Request $request)
    {
        $list_rows = Config::where(['name' => 'list_rows'])->value('value');
        $p         = input('p', 1);
        $key       = input('post.key', '');
        return view('index', ['key' => $key, 'p' => $p, 'list_rows' => $list_rows]);
    }
    //用户列表数据查询
    public function getData(Request $request)
    {
        $limits  = $request->get('limit');
        $nowPage = $request->get('page');
        if ($request->get('key') == '') {
            $lists = AdminModel::with('role')->select();
        } else {
            $key   = $request->get('key');
            $lists = AdminModel::where('name', 'like', '%' . $key . '%')->with('role')->select();
        }
        $count   = count($lists);
        $allPage = (int) ceil($count / $limits);
        $data    = page($nowPage, $limits, $allPage, $lists);

        return ["code" => 0, "msg" => "", "count" => $count, 'data' => $data];
    }
    //添加
    public function create()
    {
        $roles = Role::all();
        return view('create', ['roles' => $roles]);
    }
    //用户添加处理
    public function store(Request $request, AdminStoreValidate $validate)
    {
        $parem=$request->post();
        if (!$validate->check($request->post())) {
            return ['code' => 0, 'msg' => $validate->getError()];
        }
        $parem['create_time']=date('Y-m-d h:i', time());
        $parem['update_time']=date('Y-m-d h:i', time());
        if (AdminModel::create($parem)) {
            return ['code' => 1, 'msg' => '添加用户成功'];
        }
    }
    //用户修改
    public function edit($id, $page)
    {
        return view('edit', [
            'admin' => AdminModel::where('id', $id)->with('role')->find(),
            'roles' => Role::all(),
            'page'  => $page,
        ]);
    }
    //用户修改处理
    public function update(Request $request, AdminUpdateValidate $validate)
    {
        $data = $request->post('password') ? $request->post() : $request->except('password');
        if (!$validate->check($data)) {
            return ['code' => 0, 'msg' => $validate->getError()];
        }
        if (AdminModel::update($data)) {
            return ['code' => 1, 'msg' => '编辑成功'];
        }
    }
    //用户单个删除
    public function delete($id)
    {
        if (AdminModel::destroy($id)) {
            $count = AdminModel::count();
            return ['code' => 1, 'msg' => '删除成功', 'count' => $count];
        }
    }
    //用户多个删除
    public function deleteMany(Request $request)
    {
        $data = $request->post();
        $ids  = [];
        foreach ($data['arrIds'] as $key => $v) {
            $ids[] = (int) $v;
        }
        if (AdminModel::destroy($ids)) {
            $count = AdminModel::count();
            return ['code' => 1, 'msg' => '删除成功', 'count' => $count];
        }
    }
    //用户状态修改
    public function status(Request $request)
    {
        $id    = $request->get('id');
        $admin = AdminModel::get($id);
        if ($admin->status == 1) {
            $admin->status = 0;
            $admin->save();
            return ['code' => 1, 'msg' => '已禁用'];
        }
        $admin->status = 1;
        $admin->save();
        return ['code' => 0, 'msg' => '已开启'];
    }
}
