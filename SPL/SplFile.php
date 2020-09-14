<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/9/14
 * Time:10:31
 */

date_default_timezone_set('PRC');
$file = new SplFileInfo('file.txt');

// 获取文件的创建时间
echo date('Y-m-d H:i:s',$file->getCTime())."\n";
// 获取最后修改时间
echo date('Y-m-d H:i:s',$file->getMTime())."\n";
// 获取文件的最后访问时间
echo date('Y-m-d H:i:s',$file->getATime())."\n";
// 获取文件大小
echo $file->getSize()."\n";

// 读取文件内容
$fileObj = $file->openFile('r');
while ($fileObj->valid())
{
    echo $fileObj->fgetc();
}

$fileObj = null;
$file = null;


// 文件写入
//$file_w = new SplFileObject('file.txt','w');
// 不保留文件原有内容写入
// $file_w->fwrite('This is write.');
