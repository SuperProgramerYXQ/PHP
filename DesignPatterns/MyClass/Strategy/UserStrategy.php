<?php
/** 策略接口
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/6
 * Time:8:52
 */
namespace MyClass\Strategy;
interface UserStrategy
{
    // 展示广告
    function showAdd();
    // 展示分类
    function showCategory();
}