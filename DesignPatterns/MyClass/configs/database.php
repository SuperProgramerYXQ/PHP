<?php
/**
 * 数据库配置文件
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/12
 * Time:10:12
 */
$config = array(
    // 主数据库
    'master' => array(
        'type' => 'MySQL',
        'host' => '127.0.0.1',
        'user' => 'root',
        'password' => 'root',
        'dbname' => 'php-test'
    ),
    // 从数据库
    'slave' => array(
        'slave1' => array(
            'type' => 'MySQL',
            'host' => '127.0.0.1',
            'user' => 'root',
            'password' => 'root',
            'dbname' => 'php-test'
        ),
    )
);

return $config;