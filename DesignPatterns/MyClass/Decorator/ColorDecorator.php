<?php
/**
 * 颜色装饰器
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/11
 * Time:9:24
 */
namespace MyClass\Decorator;
class ColorDecorator implements Decorator
{
    /**
     * @var string
     */
    private $color;

    function __construct($color = 'red')
    {
        $this->color = $color;
    }

    function Before()
    {
        echo "<div style='color: {$this->color}'>";
    }
    function After()
    {
        echo "</div>";
    }
}