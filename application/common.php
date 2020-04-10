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
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
/**
* 成功 
* @param status状态 data数据
* @return json
*/
function return_succ($msg,$status = 0)
{
	$data['status'] = $status;
  $data['msg'] = $msg;

	return json($data);
}

/**
* 失败
* @param status状态 data数据
* @return json
*/
function return_error($msg,$status = 1)
{
	$data['status'] = $status;
    $data['msg'] = $msg;

	return json($data);
}

/**
* 备用
* @param status状态 data数据
* @return json
*/
function return_other($msg,$status = 2)
{
	$data['status'] = $status;
    $data['msg'] = $msg;

	return json($data);
}

/**
 * 打印函数
 */
function p($var){
    if($var===false){
        var_dump($var);
    }else{
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

/**
 * 获取ip
 */
function get_ip(){
  if (isset($_SERVER)) {
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $realip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
      $realip = $_SERVER['HTTP_CLIENT_IP'];
    } else {
      $realip = $_SERVER['REMOTE_ADDR'];
    }
  } else {
    if (getenv("HTTP_X_FORWARDED_FOR")) {
      $realip = getenv( "HTTP_X_FORWARDED_FOR");
    } elseif (getenv("HTTP_CLIENT_IP")) {
      $realip = getenv("HTTP_CLIENT_IP");
    } else {
      $realip = getenv("REMOTE_ADDR");
    }
  }
  return $realip;
}