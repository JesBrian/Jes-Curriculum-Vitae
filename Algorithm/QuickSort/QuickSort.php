<?php
/**
 * 快速排序
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-13
 * Time: 23:49
 */

$arr = [25, 2, 36, 15, 18, 9, 48, 4, 8];

function quickSort($arr)
{
    //先判断是否需要继续进行
    $length = count($arr);
    if ($length <= 1) {
        return $arr;
    }

    //如果没有返回，说明数组内的元素个数 多余1个，需要排序
    //选择一个标尺,选择第一个元素
    $base_num = $arr[0];
    //遍历 除了标尺外的所有元素，按照大小关系放入两个数组内
    //初始化两个数组
    $leftArray = [];//小于标尺的
    $rightArray = [];//大于标尺的
    for ($i = 1; $i < $length; $i++) {
        if ($base_num > $arr[$i]) {
            //小于标尺的放入左边数组
            $leftArray[] = $arr[$i];
        } else {
            //大于标尺的放入右边
            $rightArray[] = $arr[$i];
        }
    }

    //再分别对 左边 和 右边的数组进行相同的排序处理方式,递归调用这个函数,并记录结果
    $leftArray = quickSort($leftArray);
    $rightArray = quickSort($rightArray);

    //合并左边 标尺 右边
    return array_merge($leftArray, array($base_num), $rightArray);
}

print_r(quickSort($arr));