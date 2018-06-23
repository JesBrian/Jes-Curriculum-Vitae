<?php
/**
 * 设计模式 - 访问者模式
 *  1 - 抽象访问者(State):为该对象结构中具体元素角色声明一个访问操作接口。该操作接口的名字和参数标识了发送访问请求给具体访问者的具体元素角色，这样访问者就可以通过该元素角色的特定接口直接访问它。
 *  2 - 具体访问者(Success):实现访问者声明的接口。
 *  3 - 抽象元素(Person):定义一个接受访问操作accept()，它以一个访问者作为参数。
 *  4 - 具体元素(Man):实现了抽象元素所定义的接受操作接口。
 *  5 - 结构对象(ObjectStruct):这是使用访问者模式必备的角色。它具备以下特性：能枚举它的元素；可以提供一个高层接口以允许访问者访问它的元素；如有需要，可以设计成一个复合对象或者一个聚集（如一个列表或无序集合）。
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-06-21
 * Time: 21:46
 */

//抽象状态
abstract class State
{
    protected $state_name;

    //得到男人反应
    public abstract function GetManAction(VMan $elementM);
    //得到女人反应
    public abstract function GetWomanAction(VWoman $elementW);
}

//抽象人
abstract class Person
{
    public $type_name;

    public abstract function Accept(State $visitor);
}

//成功状态
class Success extends State
{
    public function __construct()
    {
        $this->state_name = "成功";
    }
    public function GetManAction(VMan $elementM)
    {
        echo "{$elementM->type_name}:{$this->state_name}时，背后多半有一个伟大的女人。\n";
    }
    public function GetWomanAction(VWoman $elementW)
    {
        echo "{$elementW->type_name}:{$this->state_name}时，背后大多有一个不成功的男人。\n";
    }
}

//失败状态
class Failure extends State
{
    public function __construct()
    {
        $this->state_name = "失败";
    }
    public function GetManAction(VMan $elementM)
    {
        echo "{$elementM->type_name}:{$this->state_name}时，闷头喝酒，谁也不用劝。\n";
    }
    public function GetWomanAction(VWoman $elementW)
    {
        echo "{$elementW->type_name}:{$this->state_name}时，眼泪汪汪，谁也劝不了。\n";
    }
}

//恋爱状态
class Amativeness extends State
{
    public function __construct()
    {
        $this->state_name = "恋爱";
    }
    public function GetManAction(VMan $elementM)
    {
        echo "{$elementM->type_name}:{$this->state_name}时，凡事不懂也要装懂。\n";
    }
    public function GetWomanAction(VWoman $elementW)
    {
        echo "{$elementW->type_name}:{$this->state_name}时，遇事懂也要装作不懂。\n";
    }
}

//男人
class VMan extends Person
{
    function __construct()
    {
        $this->type_name = "男人";
    }
    public function Accept(State $visitor)
    {
        $visitor->GetManAction($this);
    }
}

//女人
class VWoman extends Person
{
    public function __construct()
    {
        $this->type_name = "女人";
    }
    public function Accept(State $visitor)
    {
        $visitor->GetWomanAction($this);
    }
}

//对象结构
class ObjectStruct
{
    private $elements = array();

    //增加
    public function Add(Person $element)
    {
        array_push($this->elements, $element);
    }
    //移除
    public function Remove(Person $element)
    {
        foreach ($this->elements as $k => $v) {
            if ($v == $element) {
                unset($this->elements[$k]);
            }
        }
    }
    //查看显示
    public function Display(State $visitor)
    {
        foreach ($this->elements as $v) {
            $v->Accept($visitor);
        }
    }
}


$os = new ObjectStruct();
$os->Add(new VMan());
$os->Add(new VWoman());

//成功时反应
$ss = new Success();
$os->Display($ss);

//失败时反应
$fs = new Failure();
$os->Display($fs);

//恋爱时反应
$ats=new Amativeness();
$os->Display($ats);

