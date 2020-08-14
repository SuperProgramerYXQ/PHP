<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/5
 * Time:10:32
 */

namespace MyClass;

// 适配器模式
interface IDataBase
{
    // 数据库连接
    function connect($host,$user,$pwd,$dbname);
    // 执行数据库语句
    function query($sql);
    // 断开数据库连接
    function close();

}



class DataBase
{
    protected static $db;
    private function __construct()
    {
        // TODO: 注册单例模式，使类无法直接 new
    }
    // 获取 DataBase 实例
    static function GetInstance()
    {
        if (!self::$db) {
            self::$db = new self();
        }
        return self::$db;
    }
    function where($where){
        return $this;
    }

    function order($order){
        return $this;
    }

    function limit($limit){
        return $this;
    }
}