<?php
/**
 * 注册类
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/5
 * Time:14:37
 */
namespace MyClass;
class Factory
{
    static function createDataBase()
    {
        // $db = new DataBase();  // 设置单例模式后无法直接 new 对象
        $db = DataBase::GetInstance();
        Register::set('new-db',$db);
        return $db;
    }


    static function getUser($id)
    {
        // 注册方法
        $key = 'user_'.$id;  // 使用 id 连接确保修改的是同一条数据
        $user = Register::GetObject($key);
        if (!$user) {
            $user = new User($id);
            Register::set($key,$user);
        }

        // $user = new User($id);
        return $user;
    }
}