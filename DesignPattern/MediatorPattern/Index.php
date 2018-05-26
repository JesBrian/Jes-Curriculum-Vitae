<?php
/**
 * 设计模式 - 中介者模式
 *  1 - 用一个中介者对象来封装一系列的对象交互
 *  2 - 中介者使得各对象不需要显式地相互引用，从而使其松散耦合，而且可以独立地改变它们之间的交互
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-05-26
 * Time: 22:12
 */

//抽象国家
abstract class Country
{
    protected $mediator;

    public function __construct(UnitedNations $_mediator)
    {
        $this->mediator = $_mediator;
    }
}

//具体国家类
//美国
class USA extends Country
{
    function __construct(UnitedNations $mediator)
    {
        parent::__construct($mediator);
    }

    //声明 - 调用中介者传递消息
    public function Declared($message)
    {
        $this->mediator->Declared($message, $this);
    }

    //获得消息
    public function GetMessage($message)
    {
        echo "美国获得对方消息：$message" . PHP_EOL;
    }
}

//中国
class China extends Country
{
    public function __construct(UnitedNations $mediator)
    {
        parent::__construct($mediator);
    }

    //声明 - 调用中介者传递消息
    public function Declared($message)
    {
        $this->mediator->Declared($message, $this);
    }

    //获得消息
    public function GetMessage($message)
    {
        echo "中方获得对方消息：$message" . PHP_EOL;
    }
}

//抽象中介者
//抽象联合国机构
abstract class UnitedNations
{
    //声明
    public abstract function Declared($message, Country $colleague);
}

//联合国机构
class UnitedCommit extends UnitedNations
{
    public $countryUsa;
    public $countryChina;

    //声明 - 中介者根据不同对象传递的消息进行操作
    public function Declared($message, Country $colleague)
    {
        if ($colleague == $this->countryChina) {
            $this->countryUsa->GetMessage($message);
        } else {
            $this->countryChina->GetMessage($message);
        }
    }
}

//测试代码块
$UNSC = new UnitedCommit();
$c1 = new USA($UNSC);
$c2 = new China($UNSC);
$UNSC->countryChina = $c2;
$UNSC->countryUsa =$c1;
$c1->Declared('姚明的篮球打的就是好');
$c2->Declared('谢谢。');
