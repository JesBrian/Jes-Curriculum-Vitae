<?php
/**
 * 设计模式 - 单例模式
 *  1 - 私有化一个属性用于存放唯一的一个实例
 *  2 - 私有化构造方法，私有化克隆方法，用来创建并只允许创建一个实例
 *  3 - 公有化静态方法，用于向系统提供这个实例
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

    // 私有化克隆方法
    private function __clone()
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
