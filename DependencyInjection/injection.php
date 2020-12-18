<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/12/17
 * Time:9:36
 * 注入
 */



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
 * 汽车类
 * Class Car
 */
class Car
{
    private $wheel;
    // 汽车厂商拿到轮子厂商给的轮子
    public function __construct(Wheel $wheel)
    {
        $this->wheel = $wheel;
    }

    /**
     * 汽车要能跑，需要依赖轮子
     */
    public function run()
    {
//        $wheel = $this->wheel;
        // 拿到轮子
        $this->wheel->create();
        // 拥有了跑的能力
    }

}

class Human
{
    private $car;

    /**
     * 将汽车类注入到类
     * 此时代表 Human 类拥有 Car 类所有功能
     * Human constructor.
     * @param Car $car
     */
    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function drive()
    {
        $this->car->run();
    }
}
// 轮子厂商造轮子
$wheel = new Wheel();

// 汽车厂商拿到轮子并向人类提供车子，此时人类将不用管汽车厂商怎么拿到轮子的
$car = new Car($wheel);
// 人类只管开车
$human = new Human($car);

$human->drive();
