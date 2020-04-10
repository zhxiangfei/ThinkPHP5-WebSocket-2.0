<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/09/07 0011
 * Time: 09:07
 */

return[
   // +----------------------------------------------------------------------
    // | 会话设置
    // +----------------------------------------------------------------------

    'session'                => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => '',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
        //设置过期时间
        'expire'         => 7200,
    ],

];