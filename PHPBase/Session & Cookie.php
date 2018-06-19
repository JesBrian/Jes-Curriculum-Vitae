<?php
/**
 * PHP 基础 - session & cookie
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-20
 * Time: 17:13
 */

// 设置 cookie
//setcookie($name, $value, $liveTime, $domain);
setcookie('name', 'JesBrian', time() + 3600);

// 读取 cookie
echo $_COOKIE['name'];

// 删除某个 cookie
setcookie('name', '', time() - 3);
unset($_COOKIE['name']);


session_start(); // 必须有 - 且前面不许有输出，这里做个演示
// 设置 session
$_SESSION['name'] = 'JesBrian';

// 读取 session
echo $_SESSION['name'];

// 删除某个 session
unset($_SESSION['name']);
session_unset('name');

// 清除 session
session_destroy();



/**
    session 优化思路：
        1、session 小文件，分开目录存
        2、使用 mysql 存储 session
        3、使用 redis 替代文件存储 session


 */