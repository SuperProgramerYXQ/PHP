<?php
/**
 * 针对女性策略
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/6
 * Time:8:59
 */
namespace MyClass\Strategy;
class FemaleUserStrategy implements UserStrategy
{
    function showAdd()
    {
        // TODO: Implement showAdd() method.
        echo "聚会晚礼服";
    }
    function showCategory()
    {
        // TODO: Implement showCategory() method.
        echo "女装";
    }
}