<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/12/17
 * Time:10:11
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
        echo '轮子做好了<br>';
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
        echo '拿到轮子了现在具备跑的能力<br>';
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
        echo '拿到车子了<br>';
    }
}

/**
 * 容器
 * Class IOC
 */
class IOC
{
    protected static $registry = array();

    /**
     * 绑定
     * @param $key
     * @param callable $resolver
     */
    public static function bind($key,Callable $resolver)
    {
        static::$registry[$key] = $resolver;
    }

    /**
     * 生产类
     * @param $key
     * @return mixed
     */
    public static function make($key)
    {
        if (isset(static::$registry[$key])) {
            $resolver = static::$registry[$key];
            return $resolver();
        }

    }
}


IOC::bind('wheel',function (){
    return new Wheel();
});
IOC::bind('car',function (){
    return new Car(IOC::make('wheel'));
});
IOC::bind('human',function (){
    return new Human(IOC::make('car'));
});


$superman = IOC::make('human');

$superman->drive();
