<?php
/**
 * SPL 双向链表
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/9/12
 * Time:10:08
 */
$obj = new SplDoublyLinkedList();

$obj->push(
    array(
        'name' => 'Alison',
        'age' => 18
    )
);
$obj->push(
    array(
        'name' => 'Mare',
        'age' => 18
    )
);
// 向 Bottom 插入节点
$obj->unshift(
    array(
        'name' => 'VIP',
        'age' => 20
    )
);
$obj->push(
    array(
        'name' => 'Pater',
        'age' => 22
    )
);

var_dump($obj);
// 指针指向不存在的节点时为空（false），$obj->valid() 判断当前节点是否是有效节点，返回 true | false
$obj->rewind(); // 将指针指向 Bottom 所在节点

echo 'Bottom:'.json_encode($obj->bottom())."\n"; // 获取对象中的第一个节点
echo 'Top:'.json_encode($obj->top())."\n"; // 获取对象中的最后一个节点

echo 'Current:'.json_encode($obj->current())."\n"; // 获取指针当前指向的节点
$obj->next(); // 将指针指向当前节点的下一节点
echo 'Next Current:'.json_encode($obj->current())."\n";
$obj->prev(); // 将指针指向当前节点的上一节点
echo 'Prev Current:'.json_encode($obj->current())."\n";

echo "-------------------rest----------------------\n";
$obj->rewind();
// 取出 Top 的节点并删除，如果 current 正好指向 Top 位置时，调用 pop 将导致指针 current 失效，为 false
echo 'Pop value:'.json_encode($obj->pop())."\n";
var_dump($obj);
echo 'Current:'.json_encode($obj->current())."\n";
// 取出 Bottom 的节点并删除，如果 current 正好指向 Bottom 位置时，调用 pop 将导致指针 current 失效，为 false
echo 'Shift value:'.json_encode($obj->shift())."\n";
var_dump($obj);
echo 'Current:'.json_encode($obj->current())."\n";