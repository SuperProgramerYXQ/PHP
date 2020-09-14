<?php
/**
 * 类的自动加载
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/9/11
 * Time:16:23
 */
spl_autoload_extensions('.php'); // 设置寻找文件的扩展名，多个时用逗号分隔
set_include_path(get_include_path().PATH_SEPARATOR."Database/"); // 设置要加载的文件目录
spl_autoload_register(); // 进行自动加载

new DB();
