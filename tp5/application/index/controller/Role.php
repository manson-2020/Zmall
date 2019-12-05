<?php

namespace app\index\controller;

use app\index\model\Config;
use app\index\model\Admin;
use app\index\model\NodeRole;
use app\index\model\Role as RoleModel;
use think\Controller;
use think\Request;

class Role extends Base
{
    protected $limits;

    public function __construct()
    {
        parent::__construct();
        $this->limits = Config::where(['name' => 'list_rows'])->value('value');;
    }
    //角色列表展示页面
    public function index(Request $request)
    {
        $key = $request->get('key') ?: '';
        return view('index', ['key' => $key, 'limits' => $this->limits]);
    }
    //角色列表数据展示
    public function getRoleData(Request $request)
    {

        $nowPage = $request->get('page') ?: 1;
        $lists   = $request->get('key') 
                ? RoleModel::where('role_name', 'like', '%' . $request->get('key') . '%')->select() 
                : RoleModel::all();
        $count   = count($lists);
        $allPage = (int) ceil($count / $this->limits);
        $data    = page($nowPage, $this->limits, $allPage, $lists);
        return ['data' => $data, 'count' => $count];
    }
    //角色添加展示页
    public function create()
    {
        return view();
    }
    //角色添加处理
    public function store(Request $request)
    {
        if (RoleModel::create($request->post())) {
            return json(['code' => 1, 'msg' => '添加角色成功']);
        }
    }
    //角色修改展示页
    public function edit($id)
    {
        return view('edit', ['role' => RoleModel::get($id)]);
    }
    //角色修改处理
    public function update(Request $request)
    {
        RoleModel::update($request->post());
        return ['code' => 1, 'msg' => '更新角色成功'];
    }
    //角色删除
    public function delete($id)
    {
        if (RoleModel::destroy($id)) {
            Admin::where(['role_id' => $id])->update(['role_id' => null]);
            NodeRole::del($id);
        }
        return ['code' => 1, 'msg' => '删除角色成功'];
    }
    // 差距在这些地方 laravel的sync     $request->post('nodeArr') 如果是数组取不到
    public function getAccessData(Request $request)
    {
        $role = RoleModel::get($request->param('id'));
        if ('get' == $request->get('type')) {
            $nodes = $role->getNodeInfo();
            return ['code' => 1, 'data' => $nodes, 'msg' => 'succeess'];
        }
        if ('give' == $request->post('type')) {
            $data = $request->post();
            $role->nodes()->detach();
            $nodeArr = isset($data['nodeArr']) ? $data['nodeArr'] : [];
            if ($nodeArr) {
                foreach ($nodeArr as $k => $v) {
                    $nodeArr[$k] = (int) $v;
                }
                $role->nodes()->attach($nodeArr);
            }
            $nodes = $role->getNodeInfo();
            return ['code' => 1, 'data' => $nodes, 'msg' => '分配权限成功'];
        }
        return ['code' => 0, 'msg' => '获取失败', 'data' => []];
    }

}
