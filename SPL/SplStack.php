<?php
/**
 * SPL 堆栈(先进后出)
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/9/12
 * Time:11:15
 */
$stack = new SplStack();
$stack->push('Alison');  // 向堆栈推入节点
$stack->push('Mare');
$stack->push('VIP');
var_dump($stack);
// 最后进入堆栈的节点
echo 'Top:'.$stack->top()."\n";
// 最先进入堆栈的节点
echo 'Bottom:'.$stack->bottom()."\n";

// 堆栈中 offsetSet = 0 是 Top 所在位置，offsetSet = 1 是 Top 所在位置靠近 Bottom 位置相邻 1 位的节点，索引不存在时会报错
$stack->offsetSet(0,'YXQ');
var_dump($stack);

// 将指针指向 Top 位置（最后入栈那个）
$stack->rewind();
echo 'Current:'.$stack->current()."\n";

// 将指针指向当前节点前一个节点
$stack->next();
echo 'Next Current:'.$stack->current()."\n";
// 将指针指向当前节点后一个节点
//$stack->rewind();
$stack->prev();
echo 'Prev Current:'.$stack->current()."\n";

// 遍历堆栈
$stack->rewind();
while ($stack->valid())
{
    echo $stack->key().' => '.$stack->current()."\n";
    // 遍历堆栈时需要 next 一下，防止死循环
    $stack->next();
}

// 取出堆栈数据并删除
$PopObj = $stack->pop(); // 取出 Top 位置节点并删除
echo "Poped object:".$PopObj."\n";
var_dump($stack);