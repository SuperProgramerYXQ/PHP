<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/9/11
 * Time:16:20
 */

class DB
{
//    public function __construct(){
//        echo "Load Success";
//    }
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