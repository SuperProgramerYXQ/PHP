<?php
/**
 * 类自动加载
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/5
 * Time:10:58
 */
namespace MyClass;
class AutoLoad
{
    static function autoload($class){
        require './'.$class.'.php';
    }
}