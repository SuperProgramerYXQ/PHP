<?php
/**
 * ArrayIterator 迭代器
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/9/12
 * Time:15:52
 */

$arr = array(
    'HUAWEI' => 'Mate30 Pro 5G',
    'OPPO' => 'OPPO R20',
    'LG' => 'LG 300',
    'XIAOMI' => 'XIAOMI 10 Pro 5G'
);

// 传统 foreach 遍历数组

echo "*******************use ArrayIterator\n";
// 通过 ArrayIterator 迭代器遍历数组
$obj = new ArrayObject($arr); // 包装为数组对象
$it = $obj->getIterator(); // 获得数组迭代器
$it->rewind();
while ($it->valid())
{
    echo $it->key().' : '.$it->current()."\n";
    $it->next();
}
echo "*******************use ArrayIterator in seek()\n";
// 跳过某些元素
$it->rewind();

// 排序操作
//$it->ksort(); // 按 key 排序
//$it->asort(); // 按 value 排序

if ($it->valid()) {
    $it->seek(1); // position 不存在时报错
    while ($it->valid())
    {
        echo $it->key().' : '.$it->current()."\n";
        $it->next();
    }
}