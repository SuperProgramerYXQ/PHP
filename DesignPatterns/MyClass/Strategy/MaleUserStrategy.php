<?php
/**
 * 针对男性策略
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/6
 * Time:9:04
 */
namespace MyClass\Strategy;
class MaleUserStrategy implements UserStrategy
{
    function showAdd()
    {
        // TODO: Implement showAdd() method.
        echo "潮流运动";
    }
    function showCategory()
    {
        // TODO: Implement showCategory() method.
        echo "男装";
    }
}