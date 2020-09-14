<?php
/**
 * FilesystemIterator 迭代器
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/9/14
 * Time:9:25
 */
date_default_timezone_set('PRC');
$it = new FilesystemIterator('.');
foreach ($it as $finfo)
{
    echo date('Y-m-d H:i:s',$finfo->getMTime()).'--'.$finfo->getFilename().'--'.$finfo->getSize().'--'.$finfo->getType()."\n";
}