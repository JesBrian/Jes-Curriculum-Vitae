<?php
/**
 * 设计模式 - 享元模式
 *  1 - 重用现有的同类对象，如果未找到匹配的对象，则创建新对象。主要用于减少创建对象的数量，以减少内存占用和提高性能。
 *  2 - 享元工厂角色（FWFactory）：创建并管理BlogModel对象。
 *  3 - 所有具体享元父接口角色（BolgModel）：接受并作用与外部状态。
 *  4 - 具体享元角色（JobsBlog）：具体变化点，为内部对象增加储存空间。
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-06-26
 * Time: 20:42
 */


/**
 * 所有享元父接口角色
 * Interface IBlogModel
 */
interface IBlogModel
{
    function showTime();
    function showColor();
}

/**
 * 乔布斯的博客模板
 * Class JobsBlog
 */
class JobsBlog implements IBlogModel
{
    function showTime()
    {
        echo "纽约时间：5点整 - ";
    }

    function showColor()
    {
        echo "Jobs\n";
    }
}

/**
 * 雷军博客模板
 * Class LeiJunBlog
 */
class LeiJunBlog implements IBlogModel
{
    function showTime()
    {
        echo "北京时间：17点整 - ";
    }

    function showColor()
    {
        echo "雷军\n";
    }
}

/**
 * 博客模板工厂
 * Class BlogFactory
 */
class BlogFactory
{
    private $model = array();

    function getBlogModel($name)
    {
        if (isset($this->model[$name])) {
            echo "我是缓存里的\n";
            return $this->model[$name];
        } else {
            try {
                echo "我是新创建的\n";
                $class = new ReflectionClass($name);
                $this->model[$name] = $class->newInstance();
                return $this->model[$name];
            } catch (ReflectionException $e) {
                echo "你要求的对象我不能创建哦。\n";
                return null;
            }

        }
    }
}


$factory = new BlogFactory();

$jobs = $factory->getBlogModel("JobsBlog");
if ($jobs) {
    $jobs->showTime();
    $jobs->showColor();
}
$jobs1 = $factory->getBlogModel("JobsBlog");
if ($jobs1) {
    $jobs1->showTime();
    $jobs1->showColor();
}


$leijun = $factory->getBlogModel("LeiJunBlog");
if ($leijun) {
    $leijun->showTime();
    $leijun->showColor();
}
$leijun1 = $factory->getBlogModel("LeiJunBlog");
if ($leijun1) {
    $leijun1->showTime();
    $leijun1->showColor();
}

$aFanda = $factory->getBlogModel("aFanda");
if ($aFanda) {
    $aFanda->showTime();
    $aFanda->showColor();
}
