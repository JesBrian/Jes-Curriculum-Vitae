<?php
/**
 * 顺序查找
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-14
 * Time: 12:52
 */

$arr = [2, 58, 3, 49, 45, 75, 84, 888];

function sequentialSearch($array, $searchKey)
{
    $arrayLength = count($array);

    $searchIndex = -1;

    for ($i = 0; $i < $arrayLength; $i++) {
        if ($searchKey === $array[$i]) {
            $searchIndex = $i;
        }
    }

    return $searchIndex;
}

print_r(sequentialSearch($arr, 3));

