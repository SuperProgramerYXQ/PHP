<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/5
 * Time:15:37
 */
namespace MyClass\DataBase;
use MyClass\IDataBase;

class PDO implements IDataBase
{
    protected $conn;
    // 数据库连接
    function connect($host,$user,$pwd,$dbname)
    {
        $conn = new \PDO("mysql:host=$host;dbname=$dbname",$user,$pwd);
        $this->conn = $conn;
    }
    // 执行数据库语句
    function query($sql)
    {
        $res = $this->conn->query($sql);
        return $res;
    }
    // 断开数据库连接
    function close()
    {
        unset($this->conn);
    }
}