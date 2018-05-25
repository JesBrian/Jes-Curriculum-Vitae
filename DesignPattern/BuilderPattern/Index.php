<?php
/**
 * 设计模式 - 建造者模式
 *  1 - 产品角色：产品角色定义自身的组成属性
 *  2 - 抽象建造者：抽象建造者定义了产品的创建过程以及如何返回一个产品
 *  3 - 具体建造者：具体建造者实现了抽象建造者创建产品过程的方法，给产品的具体属性进行赋值定义
 *  4 - 指挥者：指挥者负责与调用客户端交互，决定创建什么样的产品
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-05-24
 * Time: 18:03
 */


/**
 * 具体产品角色  鸟类
 * Class Bird
 */
class Bird
{
    public $_head;
    public $_wing;
    public $_foot;

    function show()
    {
        echo "头的颜色:{$this->_head} - ";
        echo "翅膀的颜色:{$this->_wing} - ";
        echo "脚的颜色:{$this->_foot}";
    }
}

/**
 * 抽象鸟的建造者(生成器)
 * Class BirdBuilder
 */
abstract class BirdBuilder
{
    protected $_bird;
    function __construct()
    {
        $this->_bird = new Bird();
    }
    abstract function BuildHead();
    abstract function BuildWing();
    abstract function BuildFoot();
    abstract function GetBird();
}

/**
 * 具体鸟的建造者(生成器)   蓝鸟
 * Class BlueBird
 */
class BlueBird extends BirdBuilder
{

    function BuildHead()
    {
        // TODO: Implement BuilderHead() method.  
        $this->_bird->_head = "Blue";
    }

    function BuildWing()
    {
        // TODO: Implement BuilderWing() method.  
        $this->_bird->_wing = "Blue";
    }

    function BuildFoot()
    {
        // TODO: Implement BuilderFoot() method.  
        $this->_bird->_foot = "Blue";
    }

    function GetBird()
    {
        // TODO: Implement GetBird() method.  
        return $this->_bird;
    }
}

/**
 * 具体鸟的建造者(生成器)   玫瑰鸟
 * Class RoseBird
 */
class RoseBird extends BirdBuilder
{

    function BuildHead()
    {
        // TODO: Implement BuildHead() method.  
        $this->_bird->_head = "Red";
    }
    function BuildWing()
    {
        // TODO: Implement BuildWing() method.  
        $this->_bird->_wing = "Black";
    }
    function BuildFoot()
    {
        // TODO: Implement BuildFoot() method.  
        $this->_bird->_foot = "Green";
    }
    function GetBird()
    {
        // TODO: Implement GetBird() method.  
        return $this->_bird;
    }
}

/**
 * 指挥者
 * Class Director
 */
class Director
{
    /**
     * @param $_builder      建造者
     * @return mixed         产品类：鸟
     */
    function Construct($_builder)
    {
        $_builder->BuildHead();
        $_builder->BuildWing();
        $_builder->BuildFoot();
        return $_builder->GetBird();
    }
}


$director=new Director();

echo '蓝鸟的组成：';

$blue_bird=$director->Construct(new BlueBird());
$blue_bird->Show();

echo PHP_EOL;

echo 'Rose鸟的组成：';

$rose_bird=$director->Construct(new RoseBird());
$rose_bird->Show();  
