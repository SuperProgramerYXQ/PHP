<?php
/**
 * 约束 Proxy 类方法接口
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/11
 * Time:17:34
 */
namespace MyClass\Proxy;
interface IUserProxy
{
    function GetUserName($id);
    function SetUserName($id,$name);
}