<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/5
 * Time:15:21
 */
namespace MyClass;
class Register
{
    protected static $objects;

    static function set($alias,$object)
    {
        self::$objects[$alias] = $object;
    }

    function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }

    static function GetObject($alias)
    {
        if (isset($objects[$alias])) {
            return self::$objects[$alias];
        } else {
            return false;
        }

    }
}