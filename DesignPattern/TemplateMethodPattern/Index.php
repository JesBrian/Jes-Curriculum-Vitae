<?php
/**
 * 设计模式 - 模板方法
 *  1 - 创建抽象父类
 *  2 - 具体实现子类继承父类
 *  3 - 将子类共同方法写到父类中
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-05-22
 * Time: 20:48
 */

abstract class AbstractTemplate
{
    protected abstract function method1();

    protected abstract function method2();

    /**
     * Notes: 子类通用方法
     */
    public final function commonMethod()
    {
        $this->method1();
        $this->method2();
        echo PHP_EOL;
    }
}

class TemplateOne extends AbstractTemplate
{

    protected function method1()
    {
        // TODO: Implement method1() method.
        echo 'this is 模板1 具体方法1' . PHP_EOL;
    }

    protected function method2()
    {
        // TODO: Implement method2() method.
        echo 'this is 模板1 具体方法2' . PHP_EOL;
    }
}

class TemplateTwo extends AbstractTemplate
{

    protected function method1()
    {
        // TODO: Implement method1() method.
        echo 'this is 模板2 具体方法1' . PHP_EOL;
    }

    protected function method2()
    {
        // TODO: Implement method2() method.
        echo 'this is 模板2 具体方法2' . PHP_EOL;
    }

}


$template1 = new TemplateOne();
$template1->commonMethod();
$template2 = new TemplateTwo();
$template2->commonMethod();

