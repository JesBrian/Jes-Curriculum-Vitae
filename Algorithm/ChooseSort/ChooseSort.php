<?php
/**
 * 选择排序
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-13
 * Time: 23:03
 */

$arr = [25, 2, 36, 15, 18, 9, 48, 4, 8];

// 每次选出最小/大的，然后排接下来的
function chooseSort($array)
{
    $arrayLength = count($array);
    for ($i = 0; $i < $arrayLength; $i++) {
        for ($j = $i + 1; $j < $arrayLength; $j++) {
            if ($array[$i] > $array[$j]) {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return $array;
}

print_r(chooseSort($arr));
