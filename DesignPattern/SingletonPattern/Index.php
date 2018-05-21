<?php
/**
 * 设计模式 - 单例模式
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-05-21
 * Time: 17:04
 */

class Singleton
{
    private static $singleton = null;

    // 私有化构造函数
    private function __construct()
    {
    }

    // 获取该对象的接口
    public static function getSingelton()
    {
        if (!(self::$singleton instanceof Singleton)) {
            self::$singleton = new Singleton();
        }
        return self::$singleton;
    }
}

var_dump(Singleton::getSingelton());
