<?php
/**
 * AppendIterator 迭代器
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/9/12
 * Time:16:27
 */
$arr_a = array(
    'HUAWEI' => 'Mate30 Pro 5G',
    'OPPO' => 'OPPO R20',
    'LG' => 'LG 300',
    'XIAOMI' => 'XIAOMI 10 Pro 5G'
);
$arr_b = array(
    'HUAWEI' => 'P30 Pro 5G',
    'OPPO' => 'OPPO RS',
    'LG' => 'LG 400',
    'XIAOMI' => 'XIAOMI 9'
);

$array_a = new ArrayIterator($arr_a);
$array_b = new ArrayIterator($arr_b);

$it = new AppendIterator();
$it->append($array_b);
$it->append($array_a);

$it->rewind();
while ($it->valid())
{
    echo $it->key().'=>'.$it->current()."\n";
    $it->next();
}