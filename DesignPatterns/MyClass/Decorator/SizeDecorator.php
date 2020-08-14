<?php
/**
 * 尺寸装饰器
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/11
 * Time:9:40
 */
namespace MyClass\Decorator;
class SizeDecorator implements Decorator
{
    /**
     * @var string
     */
    private $size;

    function __construct($size = '26px')
    {
        $this->size = $size;
    }

    function Before()
    {
        echo "<div style='font-size: {$this->size}'>";
    }
    function After()
    {
        echo "</div>";
    }
}