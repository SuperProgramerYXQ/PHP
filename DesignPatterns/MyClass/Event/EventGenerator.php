<?php
/**
 * 事件产生者
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/7
 * Time:11:05
 */
namespace MyClass\Event;
// 声明为抽象类（继承子类才有相关逻辑）
abstract class EventGenerator
{
    private $observers = array();
    // 增加观察者，绑定update事件
    function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }
    // 事件通知
    function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->Update();
        }
    }
}