<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/5
 * Time:10:45
 */
namespace MyClass;
class Object
{
    protected $array = array();

    function __set($name, $value)
    {
        // TODO: Implement __set() method.

        $this->array[$name] = $value;
    }

    function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->array[$name];
    }

    function __call($function_name, $param)
    {
        // TODO: Implement __call() method.
        return 'magic function __call,function name is '.$function_name.' param is ('.implode(',',$param).').';
    }

    static function __callStatic($function_name, $param)
    {
        // TODO: Implement __callStatic() method.
        return 'magic function __callStatic,static function name is '.$function_name.' param is ('.implode(',',$param).').';
    }

    function __toString()
    {
        // TODO: Implement __toString() method.
        return 'Class '.__CLASS__.' is Object.';
    }

    function __invoke($param)
    {
        // TODO: Implement __invoke() method.
        return 'Class '.__CLASS__.' Not is Function.';
    }
}