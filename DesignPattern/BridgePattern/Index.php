<?php
/**
 * 设计模式 - 桥接模式[桥梁模式]
 *  1 - 抽象化(AbstractRoad)角色：抽象化给出的定义，并保存一个对实现化对象的引用。
 *  2 - 修正抽象化(SpeedWay)角色：扩展抽象化角色，改变和修正父类对抽象化的定义。
 *  3 - 实现化(AbstractCar)角色：这个角色给出实现化角色的接口，但不给出具体的实现。必须指出的是，这个接口不一定和抽象化角色的接口定义相同，实际上，这两个接口可以非常不一样。
 *  4 - 具体实现化(Bus)角色：这个角色给出实现化角色接口的具体实现。
 *  5 - 不确定 - 其实桥接模式思想就是抽象然后混搭？？？
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-06-28
 * Time: 19:58
 */


/**抽象化角色            抽象路
 * Class AbstractRoad

 */
abstract class AbstractRoad
{
    public $icar;
    abstract function Run();
}

/**具体的             高速公路
 * Class speedRoad
 */
class SpeedRoad extends AbstractRoad
{
    function Run()
    {
        $this->icar->Run();
        echo ":在高速公路上。";
    }
}

/**乡村街道
 * Class Street
 */
class Street extends AbstractRoad
{
    function Run()
    {
        $this->icar->Run();
        echo ":在乡村街道上。";
    }
}

/**抽象汽车接口
 * Interface ICar
 */
interface ICar
{
    function Run();
}

/**吉普车
 * Class Jeep
 */
class Jeep implements ICar
{
    function Run()
    {
        echo "吉普车跑";
    }
}

/**小汽车
 * Class Car
 */
class Car implements ICar
{
    function Run()
    {
        echo "小汽车跑";
    }
}


$speedRoad=new SpeedRoad();
$speedRoad->icar=new Car();
$speedRoad->Run();

echo PHP_EOL;

$street=new Street();
$street->icar=new Jeep();
$street->Run();
