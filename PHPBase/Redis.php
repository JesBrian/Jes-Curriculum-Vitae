<?php
/**
 * PHP 基础 - Redis操作
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-20
 * Time: 17:16
 */

/**
 * Notes:
 * User: JesBrian
 * Date: 2018-05-08
 * Time: 14:27
 * @return Redis
 */
function getRedisConnect()
{
    //实例化redis
    $redis = new Redis();
    //连接
    $redis->connect('127.0.0.1', 6379);
    //检测是否连接成功
    echo "Server is running: " . $redis->ping();
    // 输出结果 Server is running: +PONG

    return $redis;
}
getRedisConnect();
