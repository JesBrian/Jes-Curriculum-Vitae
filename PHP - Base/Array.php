<?php
/**
 * PHP 基础 - 数组
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-18
 * Time: 8:36
 */

$array = [1, 2, 3, 4];

function arrayOper1($array)
{
    print_r($array);

// 尾部插入 - 入栈
    array_push($array, 5, 6, 7);
    print_r($array);

// 尾部弹出 - 出栈
    array_pop($array);
    print_r($array);

// 头部插入
    array_unshift($array, -2, -1, 0);
    print_r($array);

// 头部弹出 - 出队列
    array_shift($array);
    print_r($array);
}
//arrayOper1($array);


function arrayOper2()
{

}




