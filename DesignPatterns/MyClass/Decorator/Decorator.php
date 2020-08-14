<?php
/**
 * 装饰器接口
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/11
 * Time:9:01
 */
namespace MyClass\Decorator;
interface Decorator
{
    function Before();
    function After();
}