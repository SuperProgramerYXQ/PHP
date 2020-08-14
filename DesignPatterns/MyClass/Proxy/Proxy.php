<?php
/**
 * 代理类
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/11
 * Time:17:33
 */
namespace MyClass\Proxy;
class Proxy implements IUserProxy
{

    function GetUserName($id)
    {
        // TODO: Implement GetUserName() method.
        // 从数据库操作
    }

    function SetUserName($id, $name)
    {
        // TODO: Implement SetUserName() method.
        // 主数据库操作
    }
}