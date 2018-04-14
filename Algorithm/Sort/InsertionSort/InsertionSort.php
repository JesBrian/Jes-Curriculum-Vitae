<?php
/**
 * 插入排序
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-13
 * Time: 23:01
 */

$arr = [25, 2, 36, 15, 18, 9, 48, 4, 8];

function insertionSort($array)
{
    $arrayLength = count($array);
    for ($i = 1; $i < $arrayLength; $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($array[$i] < $array[$j]) {
                $temp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $temp;
            }
        }
    }
    return $array;
}

print_r(insertionSort($arr));

