<?php
/**
 * 队列（先进先出）
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/9/12
 * Time:14:32
 */
$queue = new SplQueue();

$queue->enqueue('Alison');
$queue->enqueue('Mare');
$queue->enqueue('VIP');

var_dump($queue);

// 最后入队的节点
echo 'Top:'.$queue->top()."\n";
// 最先入队的节点
echo 'Bottom:'.$queue->bottom()."\n";

// 队列中 offsetSet = 0 是 Bottom 所在位置，offsetSet = 1 是 Top 所在位置靠近 Top 位置相邻 1 位的节点，索引不存在时会报错
//$queue->offsetSet(0,'YXQ');
//var_dump($queue);

// 将指针指向 Bottom 位置（最先入队那个）
$queue->rewind();
echo 'Current:'.$queue->current()."\n";

// 将指针指向当前节点前一个节点
$queue->next();
echo 'Next Current:'.$queue->current()."\n";
// 将指针指向当前节点后一个节点
//$queue->rewind();
$queue->prev();
echo 'Prev Current:'.$queue->current()."\n";

$queue->rewind();
while ($queue->valid())
{
    echo $queue->key().' => '.$queue->current()."\n";
    // 遍历堆栈时需要 next 一下，防止死循环
    $queue->next();
}

// 取出队列数据并删除
$PopObj = $queue->dequeue(); // 取出 Top 位置节点并删除
echo "Poped object:".$PopObj."\n";
var_dump($queue);