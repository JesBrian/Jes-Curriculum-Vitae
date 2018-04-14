<?php
/**
 * 二分查找
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-14
 * Time: 12:57
 */

$arr = [-68, 0, 3, 23, 88, 156, 208, 322, 888];

function binarySearch($array, $searchKey)
{
    $searchIndex = -1;
    $leftIndex = 0;
    $rightIndex = count($array);

    while ($leftIndex <= $rightIndex) {
        $middleIndex = floor(($leftIndex + $rightIndex) / 2);

        if ($array[$middleIndex] == $searchKey) {
            $searchIndex = $middleIndex;
            break;
        } elseif ($array[$middleIndex] > $searchKey) {
            $rightIndex = $middleIndex - 1;
            continue;
        } elseif ($array[$middleIndex] < $searchKey) {
            $leftIndex = $middleIndex + 1;
            continue;
        }
    }
    return $searchIndex;
}

print_r(binarySearch($arr, 88));


