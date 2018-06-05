<?php
/**
 * 设计模式 - 策略模式
 *  1 - 抽象策略角色（RotateItem）：策略类，通常由一个接口或者抽象类实现。
 *  2 - 具体策略角色（ItemX）：包装了相关的算法和行为。
 *  3 - 环境角色（ItemContext）：持有一个策略类的引用，最终给客户端调用。
 *  4 - 简单来说就是同一个对象调用同一抽象类不同实现类的方法
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-06-03
 * Time: 17:56
 */


/**抽象策略角色
 * Interface RotateItem
 */
interface RotateItem
{
    function inertiaRotate();

    function unInertisRotate();
}

/**具体策略角色——X产品
 * Class XItem
 */
class XItem implements RotateItem
{
    function inertiaRotate()
    {
        echo "我是X产品，我惯性旋转了。";
    }

    function unInertisRotate()
    {
        echo "我是X产品，我非惯性旋转了。\r\n";
    }
}

/**具体策略角色——Y产品
 * Class YItem
 */
class YItem implements RotateItem
{
    function inertiaRotate()
    {
        echo "我是Y产品，我不能惯性旋转。";
    }

    function unInertisRotate()
    {
        echo "我是Y产品，我非惯性旋转了。\r\n";
    }
}

/**具体策略角色——XY产品
 * Class XYItem
 */
class XYItem implements RotateItem
{
    function inertiaRotate()
    {
        echo "我是XY产品，我惯性旋转。";
    }

    function unInertisRotate()
    {
        echo "我是XY产品，我非惯性旋转了。\r\n";
    }
}

class contextStrategy
{
    private $item;

    function getItem($item_name)
    {
        try {
            $class = new ReflectionClass($item_name);
            $this->item = $class->newInstance();
        } catch (ReflectionException $e) {
            $this->item = "";
        }
    }

    function inertiaRotate()
    {
        $this->item->inertiaRotate();
    }

    function unInertisRotate()
    {
        $this->item->unInertisRotate();
    }
}


$strategy = new contextStrategy();

echo "X产品：";
$strategy->getItem('XItem');
$strategy->inertiaRotate();
$strategy->unInertisRotate();

echo "Y产品：";
$strategy->getItem('YItem');
$strategy->inertiaRotate();
$strategy->unInertisRotate();

echo "XY产品：";
$strategy->getItem('XYItem');
$strategy->inertiaRotate();
$strategy->unInertisRotate();
