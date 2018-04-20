<?php
/**
 * PHP 基础 - 字符串
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-20
 * Time: 15:49
 */

// 改变字符串大小写
function getStrOper1($str1, $str2)
{
    echo lcfirst($str1) . PHP_EOL;    // lcfirst 字符串首字母小写
    echo ucfirst($str2) . PHP_EOL;    // ucfirst 字符串首字母大写
    echo ucwords($str2) . PHP_EOL;    // ucwords 字符串每个单词首字母转换大写 - [ 空格间隔 ]
    echo strToLower($str1) . PHP_EOL; // strtolower 字符串转换全小写
    echo strToUpper($str2) . PHP_EOL; // strtoupper 字符串转换全小写
}
//getStrOper1('Hello World', 'hello world');


// 字符串查找
function getStrOper2($str, $key)
{
    // 有 i 为不区分大小写，没 i 区分大小写
    echo stripos($str, $key, 1) . PHP_EOL;    // 查找 key 在字符串首次出现的位置 - 从0开始计算
    echo strripos($str,$key, 6) . PHP_EOL;    // 查找 key 在字符串最后一次出现的位置
    echo strpos($str, $key) . PHP_EOL;
    echo strrpos($str, $key, -6) . PHP_EOL;   // 负数表示倒数第n个截至查找
}
//getStrOper2('Hello World', 'O');
//getStrOper2('Hello World', 'or');


// 字符串替换
function getStrOper3($str, $searchStr, $replaceStr)
{
    echo str_replace($searchStr, $replaceStr, $str) . PHP_EOL;    // str_replace 不忽略大小写
    echo str_ireplace($searchStr, $replaceStr, $str) . PHP_EOL;   // str_ireplace 忽略大小写
    echo substr_replace($str, $replaceStr, 0,11);    // substr_replace - [ 从 start 开始使用 replaceStr 替换 length 个字符 ]
}
//getStrOper3('Hello World, hello world', 'World', 'JesBrian');


// 截取字符串
function getStrOper4()
{
    // trim / ltrim / rtrim     ---- 去除字符串首位空格
    echo substr('Hello World', 1) . PHP_EOL;
    echo substr('Hello World', 0,6) . PHP_EOL;
    echo substr('Hello World', -1) . PHP_EOL;
    echo substr('Hello World', -4, 3) . PHP_EOL;  // 注意是从倒数x个数y个截取
}
//getStrOper4();


function getStrOper5($str)
{
    echo count($str) . PHP_EOL;  // 计算数组长度
    echo strlen($str) . PHP_EOL;
    echo mb_strlen($str, 'UTF8') . PHP_EOL;
    echo htmlspecialchars($str) . PHP_EOL;
    echo htmlspecialchars_decode($str) . PHP_EOL;
}
//getStrOper5("<html>世界，您好</html>");


function getStrOper6($str, $array)
{
    echo implode(',', $array) . PHP_EOL;
    print_r(explode(',', $str));
}
//getStrOper6('a,b,c', ['666', '888']);

