<?php
/**
 * 观察者接口
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/7
 * Time:11:09
 */
namespace MyClass\Event;
interface Observer
{
    // 事件发生，更新操作
    function Update($event_info = null);
}
