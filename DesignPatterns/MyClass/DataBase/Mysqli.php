<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/5
 * Time:15:36
 */
namespace MyClass\DataBase;
use MyClass\IDataBase;

class Mysqli implements IDataBase
{
    protected $conn;
    // 数据库连接
    function connect($host,$user,$pwd,$dbname)
    {
        $conn = mysqli_connect($host,$user,$pwd,$dbname);
        $this->conn = $conn;
    }
    // 执行数据库语句
    function query($sql)
    {
        $res = mysqli_query($this->conn,$sql);
        return $res;
    }
    // 断开数据库连接
    function close()
    {
        mysqli_close($this->conn);
    }
}