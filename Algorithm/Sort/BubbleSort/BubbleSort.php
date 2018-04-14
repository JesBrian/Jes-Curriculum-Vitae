<?php
/**
 * 冒泡排序
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-13
 * Time: 22:44
 */

$arr = [25, 2, 36, 15, 18, 9, 48, 4, 8];

// 这种比较好理解
function bubbleSortOne($array)
{
    $arrayLength = count($array);
    // $i 记录次数， $j 记录数组位置
    for ($i = 1; $i < $arrayLength; $i++) {
        for ($j = 0; $j < $arrayLength - $i; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    return $array;
}

function bubbleSortTwo($array)
{
    $arrayLength = count($array);
    // 这种倒着从后面向前面排
    for ($k = 0; $k <= $arrayLength; $k++) {
        for ($j = $arrayLength - 1; $j > $k; $j--) {
            if ($array[$j] < $array[$j - 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j - 1];
                $array[$j - 1] = $temp;
            }
        }
    }
    return $array;
}

print_r(bubbleSortTwo($arr));