<?php
/**
 * 设计模式 - 原型模式
 *  1 - 先创建好一个原型对象
 *  2 - 通过clone原型对象来创建新的对象
 *      浅拷贝：被拷贝对象的所有变量都含有与原对象相同的值，而且对其他对象的引用仍然是指向原来的对象，即浅拷贝只负责当前对象实例，对引用的对象不做拷贝。
 *      深拷贝：被拷贝对象的所有的变量都含有与原来对象相同的值，除了那些引用其他对象的变量，那些引用其他对象的变量将指向一个被拷贝的新对象，而不再是原来那些被引用的对象。即深拷贝把要拷贝的对象所引用的对象也拷贝了一次。而这种对被引用到的对象拷贝叫做间接拷贝。
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-05-24
 * Time: 17:42
 */

interface Potrotype
{
    //通过在原型类中加一个copy方法，使得这个原型类的实例可以被复制
    public function copy();
}

class Demo implements Potrotype
{
    private $state;
    public $otherObj;

    public function __construct($otherObj)
    {
        $this->otherObj = $otherObj;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function copy()
    {
        // 浅拷贝
//        return clone $this;

        // 深拷贝 - 先序列化再反序列化
        return unserialize(serialize($this));
    }
}

class Other
{
    public $state = 0;
}

class Client
{
    public static function main()
    {
        $otherObj = new Other();

        $obj1 = new Demo($otherObj);
        $obj1->setState(23);
        $obj2 = $obj1->copy();
        $obj2->setState(33);
        $obj2->otherObj->state = 2;

        echo $obj1->getState() . ' - ' . $obj1->otherObj->state . PHP_EOL;
        echo $obj2->getState() . ' - ' . $obj2->otherObj->state;
    }
}

Client::main();

