<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/12/17
 * Time:9:36
 * 依赖
 * 案例：人开车
 */


/**
 * 汽车类
 * Class Car
 */
class Car
{
    /**
     * 汽车要能跑，需要依赖轮子
     */
    public function run()
    {
        $wheel = new Wheel();
        // 拿到轮子
        $wheel->create();
        // 拥有了跑的能力
    }

}

/**
 * 轮子类
 * Class Wheel
 */
class Wheel
{
    /**
     * 造轮子
     */
    public function create()
    {
        return '轮子';
    }
}

/**
 * 人类
 * Class Human
 */
class Human
{
    /**
     * 人要开车需要依赖车子
     */
    public function drive()
    {
        // 要开车需要车子
        $car = new Car();
        $car->run();
    }
}



$human = new Human();
$human->drive();
