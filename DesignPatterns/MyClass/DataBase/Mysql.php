<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/5
 * Time:15:36
 */
namespace MyClass\DataBase;
use MyClass\IDataBase;

class Mysql implements IDataBase
{
    protected $conn;
    // 数据库连接
    function connect($host,$user,$pwd,$dbname)
    {
        $conn = mysql_connect($host,$user,$pwd);
        mysql_select_db($dbname,$conn);
        $this->conn = $conn;
    }
    // 执行数据库语句
    function query($sql)
    {
        $res = mysql_query($sql,$this->conn);
        return $res;
    }
    // 断开数据库连接
    function close()
    {
        mysql_close($this->conn);
    }
}