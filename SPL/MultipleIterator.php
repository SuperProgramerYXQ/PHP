<?php
/**
 * MultipleIterator 迭代器（数据整合）
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/9/12
 * Time:17:38
 */

$idIter = new ArrayIterator(array(1,2,3,4,5,6));
$nameIter = new ArrayIterator(array('Alison','Peter','Mar','VIP','YXQ'));
$ageIter = new ArrayIterator(array(20,18,19,21,23));

$mit = new MultipleIterator(MultipleIterator::MIT_KEYS_ASSOC);
$mit->attachIterator($idIter,'ID');
$mit->attachIterator($nameIter,'Name');
$mit->attachIterator($ageIter,'Age');

$mit->rewind();
while ($mit->valid())
{
    echo json_encode($mit->current())."\n";
    $mit->next();
}
