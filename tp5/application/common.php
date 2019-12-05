<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Db;
use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;

function page($page, $limits, $allPage, $lists)
{
    if (count($lists) == 0) {
        return '';
    }
    $data = [];
    for ($i = 1; $i <= $allPage; $i++) {
        for ($j = $limits * ($i - 1); $j < $limits * $i; $j++) {
            if (isset($lists[$j])) {
                $data[$i][] = $lists[$j];
            }
        }
    }
    if (isset($data[$page])) {
        return $data[$page];
    } else {
        return [];
    }

}

// 左侧菜单无极分类
function rule($cate, $lefthtml = '— — ', $pid = 0, $lvl = 0, $leftpin = 0)
{
    $arr = array();
    foreach ($cate as $v) {
        if ($v['pid'] == $pid) {
            $v['lvl'] = $lvl + 1;
            $v['leftpin'] = $leftpin + 0;//左边距
            $v['lefthtml'] = str_repeat($lefthtml, $lvl);
            $arr[] = $v;
            $arr = array_merge($arr, rule($cate, $lefthtml, $v['id'], $lvl + 1, $leftpin + 20));
        }
    }
    return $arr;
}

// 获取所有子集id数组
function getChildIds($id, $nodes)
{
    $arr = [];
    foreach ($nodes as $node) {
        if ($node->pid == $id) {
            $arr[] = $node->id;
            $arr = array_merge($arr, getChildIds($node->id, $nodes));
        }
    }
    return $arr;
}

/**
 * 格式化字节大小
 * @param number $size 字节数
 * @param string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 */
function format_bytes($size, $delimiter = '')
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
    for ($i = 0; $size >= 1024 && $i < 5; $i++) {
        $size /= 1024;
    }
    return $size . $delimiter . $units[$i];
}

/**
 * 验证手机号是否正确
 * @param number $mobile
 * @author honfei
 */
//function isMobile($mobile)
//{
//    if (!is_numeric($mobile)) {
//        return false;
//    }
//    return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
//}

/**
 * @param $to    接收人
 * @param $model    短信模板ID
 * @param $code   短信验证码
 */
//function send_sms($to, $code)
//{
//
//    require_once '../extend/alisms/vendor/autoload.php';
//    Config::load(); //加载区域结点配置
////    $config = '根据你的实际情况读取配置文件或读取数据库，本项目是将配置写入数据库实现';
//    $accessKeyId = 'LTAIgSUCt2CM3beZ';
//    $accessKeySecret = 'M8mKPvDlBEHTotr64cb6u9Sc80Pujm';
//    $templateParam = $code;
//    //短信签名
//    $signName = '温江门户网';
//    //短信模板ID
//    $templateCode = 'SMS_157280718 ';
////    switch ($model){
////        case 1:
////            $templateCode = $config['model_code_rl']; // 注册登录短信验证码模板
////            break;
////        case 2:
////            $templateCode = $config['model_code_reset']; // 重置密码短信验证码模板
////            break;
////    }
//    //短信API产品名（短信产品名固定，无需修改）
//    $product = "Dysmsapi";
//    //短信API产品域名（接口地址固定，无需修改）
//    $domain = "dysmsapi.aliyuncs.com";
//    //暂时不支持多Region（目前仅支持cn-hangzhou请勿修改）
//    $region = "cn-hangzhou";
//    // 初始化用户Profile实例
//    $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
//    // 增加服务结点
//    DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
//    // 初始化AcsClient用于发起请求
//    $acsClient = new DefaultAcsClient($profile);
//    // 初始化SendSmsRequest实例用于设置发送短信的参数
//    $request = new SendSmsRequest();
//    // 必填，设置雉短信接收号码
//    $request->setPhoneNumbers($to);
//    // 必填，设置签名名称
//    $request->setSignName($signName);
//    // 必填，设置模板CODE
//    $request->setTemplateCode($templateCode);
//    // 可选，设置模板参数
//    if ($templateParam) {
//        $request->setTemplateParam(json_encode(array('code' => $templateParam)));
//    }
//    //发起访问请求
//    $acsResponse = $acsClient->getAcsResponse($request);
//    //返回请求结果
//    $result = json_decode(json_encode($acsResponse), true);
//    // 具体返回值参考文档：https://help.aliyun.com/document_detail/55451.html?spm=a2c4g.11186623.6.563.YSe8FK
//    return $result;
//}

