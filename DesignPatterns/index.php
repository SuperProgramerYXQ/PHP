<?php

    // 类的自动加载
    define('BASEDIR',__DIR__);
    include BASEDIR.'/MyClass/AutoLoad.php';
    spl_autoload_register('\\MyClass\\AutoLoad::autoload');

    // -----------------------------------------------------------------------------------------------------------------
    // SPL标准库（数据结构）
    // 栈（先进后出）
    $stack = new SplStack();
    // 入栈
    $stack->push("data1");
    $stack->push("data2");
    // 出栈
    echo $stack->pop();
    echo $stack->pop();
    // -----------------------------------------------------------------------------------------------------------------
    // 队列（先进先出）
    $queue = new SplQueue();
    // 入队
    $queue->enqueue("data1");
    $queue->enqueue("data2");
    // 出队
    echo $queue->dequeue();
    echo $queue->dequeue();
    // -----------------------------------------------------------------------------------------------------------------
    // 堆（最小堆）
    $heap = new SplMinHeap();
    $heap->insert("data1");
    $heap->insert("data2");

    echo $heap->extract();
    // -----------------------------------------------------------------------------------------------------------------
    // 固定长度数组
    $array = new SplFixedArray(10);
    $array[0] = 123;
    $array[9] = 1234;

    var_dump($array);
    echo "<br>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>";
    // -----------------------------------------------------------------------------------------------------------------
    // php 链式操作
    // $db = new \MyClass\DataBase(); // 设置单例模式后无法直接 new 对象
    $db = \MyClass\DataBase::GetInstance();
    $db->where("id=1")->order("id desc")->limit(10);

    // PHP 魔术方法
    $obj = new \MyClass\Object();
    $obj->title = '为对象内不存在的属性赋值'; // 设置对象内不存在属性时调用对象内魔术方法 __set
    echo $obj->title; // 调用对象内不存在属性时调用对象内魔术方法 __get
    echo "<br>";
    echo $obj->test('param',123); // 调用对象内不存在的方法时调用对象内魔术方法 __call，调用不存在的静态方法用 __callStatic
    echo "<br>";
    echo $obj; // 直接输出对象时回调魔术方法 __toString
    echo "<br>";
    echo $obj('param');  // 把对象当成方法是回调魔术方法 __invoke

    // 3种基本设计模式
    // 工厂模式：工厂方法或者类生成对象，而不是在代码中直接 new
    $db = \MyClass\Factory::createDataBase();
    // 单例模式：使某个类的对象仅允许创建一个
    // 注册模式：全局共享和交换对象
    $db = \MyClass\Register::GetObject('new-db');

    // 适配器下连接数据库
    $sp_db_mysql = new \MyClass\DataBase\Mysqli();
    $sp_db_mysql->connect('localhost','root','root','php-test');
    $sp_db_mysql->query("show database");
    $sp_db_mysql->close();

    // $sp_db_mysqli = new \MyClass\DataBase\Mysqli();

    echo "<br>";
    // -----------------------------------------------------------------------------------------------------------------
    // 策略实现
    class Page
    {
        protected $strategy;
        // 页面展示主逻辑
        function index()
        {
            echo "ADD:";
            $this->strategy->showAdd();
            echo "<br>";
            echo "Category:";
            $this->strategy->showCategory();
        }
        // 外部设置策略
        function setStrategy(\MyClass\Strategy\UserStrategy $strategy)
        {
            $this->strategy = $strategy;
        }
    }

    $showPage = new Page();
    // 业务逻辑决定策略方式
    if (isset($_GET['female'])) {
        $strategy = new \MyClass\Strategy\FemaleUserStrategy();
    } else {
        $strategy = new \MyClass\Strategy\MaleUserStrategy();
    }
    $showPage->setStrategy($strategy);
    $showPage->index();  // 展示策略

    echo "<br>";
    // -----------------------------------------------------------------------------------------------------------------
    // 数据对象映射模式
    $user = new \MyClass\User(1);
    // 查询数据
    echo "<pre>";
    var_dump($user->id,$user->name,$user->phone,$user->regtime);
    echo "</pre>";
    // 更改数据
//    $user->name = 'SuperProgrammer';
//    $user->phone = '13999995054';
//    $user->regtime = date('Y-m-d H:i:s');
//    echo "更新成功！<br>";
//    var_dump($user->id,$user->name,$user->phone,$user->regtime);
    echo "<br>";
    // -----------------------------------------------------------------------------------------------------------------
    // 工厂 + 注册树 数据对象映射
    // 实现目的：一个类中的两个方法分别修改表中的某个字段
    class UserPage
    {
        function FieldOne()
        {
            // 传统方法直接 new
            // $user = new \MyClass\User(1);
            // 工厂方法
            $user = \MyClass\Factory::getUser(1);
            $user->name = 'SuperProgrammer';

            $this->FieldTwo();

            echo "OK";
        }
        function FieldTwo()
        {
            // 传统方法直接 new
            // $user = new \MyClass\User(1);
            // 工厂方法
            $user = \MyClass\Factory::getUser(1);
            $user->regtime = date('Y-m-d H:i:s');
        }

        // 传统工厂方法 User 类实际被 new 了两次，
        // 解决方法传统的 $this->FieldTwo($user); function FieldTwo($user){} 参数传递会产生额外的成本，且使用不方便
        // 注册树的介入就很好的解决了以上问题
    }
//    $newUser = new UserPage();
//    $newUser->FieldOne();
    echo "<br>";

    // -----------------------------------------------------------------------------------------------------------------

    // 观察者模式（对象状态发生改变时，依赖它的对象全部都会收到通知，并自动更新）

    // 事件
    class Event extends \MyClass\Event\EventGenerator
    {
        // 触发事件
        function trigger()
        {
            echo "事件发生了".date('Y-m-d H:i:s')."<br>";
            $this->notify();
            // 高度耦合模型
//            echo "逻辑1<br>";
//            echo "逻辑2<br>";
//            echo "逻辑3<br>";
//            echo "逻辑4<br>";
//            echo "逻辑5<br>";
        }
    }
    // 观察者
    class Observer_YXQ implements \MyClass\Event\Observer
    {
        public function Update($event_info = null)
        {
            // TODO: Implement Update() method.
            echo "我是被 Update 的逻辑1<br>";
        }
    }
    $event = new Event();
    // 观察者加入
    $event->addObserver(new Observer_YXQ());
    $event->trigger();
    // -----------------------------------------------------------------------------------------------------------------
    // 原型模式（创建好原型对象，然后通过 clone 原型对象来创建新对象，避免重复的初始化 new 操作，适用于创建大对象）
    class CloneObj
    {
        function OneFunction()
        {

        }
        // .........N 个Function
        function TwoFunction()
        {

        }
        // 以上方法均为初始化设置
        function perform()
        {
            // 执行初始化设置结果
        }
    }

    // 建立原型对象
    $prototype = new CloneObj();
    // 初始化原型方法
    $prototype->OneFunction();
    $prototype->TwoFunction();

    // 执行方法
    $canvas = clone $prototype;
    $canvas->perform(); // 执行原型对象内方法

    // -----------------------------------------------------------------------------------------------------------------
    // 装饰器模式
    class DecoratorObj
    {
        protected $decorators = array();
        // 执行方法之前对装饰器调用
        function beforeContent()
        {
            foreach ($this->decorators as $decorator)
            {
                $decorator->Before();
            }
        }
        // 执行方法之后对装饰器调用
        function afterContent()
        {
            $decorators = array_reverse($this->decorators); // 装饰器反转
            foreach ($decorators as $decorator)
            {
                $decorator->After();
            }
        }
        function Content()
        {
            $this->beforeContent();
            for ($i = 0; $i < 10; $i++) {
                echo $i;
            }
            $this->afterContent();
        }

        // 添加装饰器对象
        function addDecoratorObj(MyClass\Decorator\Decorator $decorator) // 声明装饰器接口
        {
            $this->decorators[] = $decorator;
        }
    }

    $decorator = new DecoratorObj();
    // 加入装饰器
    $decorator->addDecoratorObj(new \MyClass\Decorator\ColorDecorator('blue'));
    $decorator->addDecoratorObj(new \MyClass\Decorator\SizeDecorator('30px'));
    $decorator->Content();
    echo "<br>";
    // -----------------------------------------------------------------------------------------------------------------

    // 迭代器模式（在不需要了解内部实现的前提下，遍历一个聚合对象的内部元素。）
    $iteration_user = new \MyClass\Iteration\AllUser();
    foreach ($iteration_user as $it_user)
    {
        // 可对数据库进行操作
        // $it_user->regtime = date('Y-m-d H:i:s');
        var_dump($it_user->name);
    }
    echo "<br>";
    // -----------------------------------------------------------------------------------------------------------------

    // 代理模式（在客户端与实体之间建立代理对象，客户端对实体操作全部委派给代理对象，隐藏实体的具体实现细节）
    // MySQL 主从分离实例

    // 创建代理对象
    $proxy = new \MyClass\Proxy\Proxy();
    $proxy->GetUserName(1);
    $proxy->SetUserName(1,'YXQ');
    echo "<br>";
    // -----------------------------------------------------------------------------------------------------------------
    // 自动加载配置
    $config = new \MyClass\Config('./MyClass/configs');
    var_dump($config['database']);

?>