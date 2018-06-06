<?php
/**
 * 设计模式 - 适配器模式
 *  1 - 目标(Target)角色：定义客户端使用的与特定领域相关的接口，这也就是我们所期待得到的
 *  2 - 源(Adaptee)角色：需要进行适配的接口
 *  3 - 适配器(Adapter)角色：对Adaptee的接口与Target接口进行适配；适配器是本模式的核心，适配器把源接口转换成目标接口，此角色为具体类。
 *  4 - 其实也就是你家墙上有一个两口的插座（Adaptee），但你买了一个电风扇（Target）需要三个口的，这个时候你就需要一个插排（Adapter）
 *  5 - 或者是原有的业务逻辑（函数名，要获取的信息不变），但是新的业务逻辑与旧的业务逻辑有冲突，需要中间的适配器缓冲层 --- 这里的例子并没有展示这个方面
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-06-05
 * Time: 21:46
 */

/**
 * 目标角色
 */
interface Target
{
    /**
     * 源类也有的方法1
     */
    public function sampleMethod1();

    /**
     * 源类没有的方法2
     */
    public function sampleMethod2();
}

/**
 * 源角色
 */
class Adaptee
{
    /**
     * 源类含有的方法
     */
    public function sampleMethod1()
    {
        echo 'Adaptee sampleMethod1' . PHP_EOL;
    }
}

/**
 * 类适配器角色
 */
class Adapter extends Adaptee implements Target
{
    /**
     * 源类中没有sampleMethod2方法，在此补充
     */
    public function sampleMethod2()
    {
        echo 'Adapter sampleMethod2' . PHP_EOL;
    }
}

class Client
{
    /**
     * Main program.
     */
    public static function main()
    {
        $adapter = new Adapter();
        $adapter->sampleMethod1();
        $adapter->sampleMethod2();
    }
}


Client::main();
