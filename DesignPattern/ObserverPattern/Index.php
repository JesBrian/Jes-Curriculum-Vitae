<?php
/**
 * 设计模式 - 观察者模式
 *  1 -
 *  2 -
 *  3 -
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-06-13
 * Time: 22:05
 */

// 主题接口
interface Subject
{
    public function register(Observer $observer);
    public function notify();
}

// 观察者接口
interface Observer
{
    public function watch();
}

// 主题
class Action implements Subject
{
    public $observers = array();
    public function register(Observer $observer)
    {
        $this->observers[] = $observer;
    }
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->watch();
        }
    }
}

// 观察者
class Cat implements Observer
{
    public function watch()
    {
        echo 'Cat watches TV' . PHP_EOL;
    }
}
class Dog implements Observer
{
    public function watch()
    {
        echo 'Dog watches TV' . PHP_EOL;
    }
}
class People implements Observer
{
    public function watch()
    {
        echo 'People watches TV' . PHP_EOL;
    }
}


// 应用实例
$action = new Action();
$action->register(new Cat());
$action->register(new People());
$action->register(new Dog());
$action->notify();
