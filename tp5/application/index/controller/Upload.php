<?php
namespace app\index\controller;

use think\File;
use think\Request;
use Qiniu\Storage\UploadManager;
use Qiniu\Auth;
use app\admin\model\Config;
use think\Controller;


class Upload extends Controller
{
    //图片上传
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $info = $file->move('./uploads/images/');
        if ($info) {
            $str =  $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME']. '/uploads/images/' . $info->getSaveName();
            echo $str;
        } else {
            echo $file->getError();
        }
    }
}
