<?php
/**
 * PHP 基础 - 数组
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-18
 * Time: 8:36
 */

$array = [1, 2, 3, 4];
$relationArray = [
    'a' => 1,
    'b' => 2,
    'c' => 3,
    'd' => 4
];

/**
 * Notes: 数组基本操作
 * User: JesBrian
 * Date: 2018-04-22
 * Time: 22:33
 */
function arrayOper1($array, $relationArray)
{
    // is_array($array) 判断是否数组

    // array_key_exists( $key, $array) 判断索引/键名是否存在数组中
    var_dump(array_key_exists(8, $array));
    var_dump(array_key_exists('a', $relationArray));

    // in_array( $value, $array) 判断数组是否存在某值
    var_dump(in_array(8, $array));
    var_dump(in_array(4, $relationArray));

    // array_search 搜索给定值的索引名
    var_dump(array_search(2, $array));
    var_dump(array_search(2, $relationArray));

    // count($array) 计算数组单元数目

    // array_rand( $array, $num) 数组随机取出单元
    print_r(array_rand($array) . PHP_EOL);
    print_r(array_rand($relationArray, 3));

    // sort($array), rsort(), asort(), arsort(), shuffle() - 数组排序[ 从小到大 ] / 打乱, a => 保持索引， r => 倒
    shuffle($array);
    print_r($array);
    sort($array);
    print_r($array);

    // array_sum($array) 计算数组所有值相加
    print_r(array_sum([1,'6','t',8,'i']) . PHP_EOL);
    print_r(array_sum($relationArray) . PHP_EOL);

    // array_product($array) 计算数组的单元乘积 - 非数值字符串为 0
    print_r(array_product(['d',5,6,'r']) . PHP_EOL);
    print_r(array_product(['8',5,6,'1']) . PHP_EOL);
    print_r(array_product($relationArray) . PHP_EOL);
}
//arrayOper1($array, $relationArray);


/**
 * Notes: 增添 / 删除数组元素
 * User: JesBrian
 * Date: 2018-04-23
 * Time: 15:42
 * @param $array
 * @param $relationArray
 */
function arrayOper2($array, $relationArray)
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

    // array_slice($array, $start, $end, $bollean) 获取数组某一部分
    print_r(array_slice($array,3,1,true));
    print_r(array_slice($relationArray, 1));
    print_r(array_slice($relationArray, 2,1));

    // array_splice( $array, $start, $num, $replacement) 可以实现删除制定下标元素， - 其他用法详细百度
    array_splice($array,1,1);
    print_r($array);
}
arrayOper2($array,$relationArray);


/**
 * Notes: 数组的拆分 / 合并
 * User: JesBrian
 * Date: 2018-04-22
 * Time: 22:52
 * @param $array
 * @param $relationArray
 */
function arrayOper4($array, $relationArray)
{
    // array_chunk( $array, $num, $boolean) 将数组拆分, $boolean 表示是否保存索引/键值
    print_r(array_chunk($array,3));
    print_r(array_chunk($array,2, true));
    print_r(array_chunk($relationArray,3));

    // array_merge(...$array) 将数组合并
    print_r(array_merge($array, $relationArray));
}
//arrayOper4($array, $relationArray);



