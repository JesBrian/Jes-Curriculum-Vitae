<?php
/**
 * PHP 基础 - 日期时间
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-20
 * Time: 17:16
 */

/**
 * Notes: 设置 PHP 默认时区
 * User: JesBrian
 * Date: 2018-04-24
 * Time: 14:41
 */
function setTimeDefaultZone()
{
    // php.ini 全局设置
//    [Date]
//    date.timezone = PRC

    // 运行脚本设置
    date_default_timezone_set('PRC');
    echo date_default_timezone_get() . PHP_EOL;
}
setTimeDefaultZone();


/**
 * Notes: 时间日期基本操作
 * User: JesBrian
 * Date: 2018-04-24
 * Time: 15:09
 */
function dateBaseOper()
{
    // time() 返回当前时间戳
    // date('Y:m:d H:i:s', $timeStamp) 格式化时间戳，如果不传入时间戳，默认为当前时间戳
    $oldNowTime = time();
    echo $oldNowTime . PHP_EOL;
    echo date('Y:m:d H:i:s', $oldNowTime) . PHP_EOL;
    sleep(2);
    echo date('Y:m:d H:i:s') . PHP_EOL;

    // strtotime 将日期字符串转为时间戳 - 但不是很智能 [ 具体百度 ]
    $timeStr = strtotime('2018-08-02 02:06:01');
    echo date('Y:m:d H:i:s', $timeStr) . PHP_EOL;

    // getdate($timestamp) 获取日期时间信息，不传入时间戳默认为当前时间
    // [ seconds - 秒 / minutes - 分 / hours - 时 / mday - 月份第几天 / wday - 星期第几天 / mon - 月份(数值) / year - 4位数年份 / yday - 年第几天 / weekday - 星期(英语) / month - 月份(英语) / 0 - 时间戳 ]
    var_dump(getdate());

}
dateBaseOper();
