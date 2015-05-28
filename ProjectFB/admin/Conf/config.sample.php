<?php
switch ($_SERVER['SERVER_NAME']) {
    case 'your_domain_name':
    {
        $db = array(
                'DB_TYPE'               => 'mysql',     // 数据库类型
                'DB_HOST'               => '', // 服务器地址
                'DB_NAME'               => '',          // 数据库名
                'DB_USER'               => '',      // 用户名
                'DB_PWD'                => '',          // 密码
                'DB_PORT'               => '3306',        // 端口
                'DB_PREFIX'             => 'fb_',    // 数据库表前缀
                );break;
    }
    
    
    default://localhost
    {
        $db = array(
                'DB_TYPE'               => 'mysql',     // 数据库类型
                'DB_HOST'               => 'localhost', // 服务器地址
                'DB_NAME'               => 'prjfb',          // 数据库名
                'DB_USER'               => 'root',      // 用户名
                'DB_PWD'                => 'toortoor',          // 密码
                'DB_PORT'               => '3306',        // 端口
                'DB_PREFIX'             => 'fb_',    // 数据库表前缀
                );break;
    }
}
return array_merge(include './config.php',$db);
?>