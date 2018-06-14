<?php
/**
 * 设计模式 - 门面模式
 *  1 - 门面（FacadeCompany）角色：此角色封装一个高层接口，将客户端的请求代理给适当的子系统对象，是门面模式的核心接口
 *  2 - 子系统（ICBC）角色：实现子系统的具体功能，处理FacadeCompany对象指派的任务。子系统没有FacadeCompany的任何信息，没有对FacadeCompany对象的引用
 *  3 - 门面角色封装好子系统的复杂操作，只需调用门面模式方法不需要调用复杂的子系统操作
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-06-14
 * Time: 20:58
 */

/**
 * 阿里股票
 */
class Ali
{
    function buy()
    {
        echo '买入阿里股票' . PHP_EOL;
    }
    function sell()
    {
        echo '卖出阿里股票' . PHP_EOL;
    }
}

/**
 * 万达股票
 */
class Wanda
{
    function buy()
    {
        echo '买入万达股票' . PHP_EOL;
    }
    function sell()
    {
        echo '卖出万达股票' . PHP_EOL;
    }
}

/**
 * 京东股票
 */
class Jingdong
{
    function buy()
    {
        echo '买入京东股票' . PHP_EOL;
    }
    function sell()
    {
        echo '卖出京东股票' . PHP_EOL;
    }
}

/**
 * 门面模式核心角色
 * Class FacadeCompany
 */
class FacadeCompany
{
    private $ali;
    private $wanda;
    private $jingdong;

    function __construct()
    {
        $this->ali = new Ali();
        $this->jingdong = new Jingdong();
        $this->wanda = new Wanda();
    }
    function buy()
    {
        $this->wanda->buy();
        $this->ali->buy();
    }
    function sell()
    {
        $this->jingdong->sell();
    }
}

$lurenA = new FacadeCompany();
$lurenA->buy();
$lurenA->sell();
