<?php
/**
 * Countable 接口
 * 类继承 Countable 接口后实现一个 count 方法，可以直接 new 对象直接使用 count() 方法直接调用，与PHP自带 count() 不同
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/9/11
 * Time:9:58
 */

$array = array(
    array(
        'name' => 'Alison',
        'age' => 18
    ),
    array(
        'name' => 'kiki',
        'age' => 30
    ),
    array(
        'name' => 'Lisa',
        'age' => 18
    )
);

echo count($array)."\n";
echo count($array[0])."\n";


class CountMe implements Countable
{
    public function count()
    {
        // TODO: Implement count() method.
        return 666;
    }
}

$test_count = new CountMe();
echo count($test_count);