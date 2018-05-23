<?php
/**
 * 设计模式 - 代理模式
 *  1 -
 *  2 -
 *  3 -
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-05-23
 * Time: 15:45
 */

abstract class IPlayer
{
    public $name = '';
    public $level = 0;
    public abstract function upLevel();
}

class ProxyPlayer extends IPlayer
{
    private $player = null;

    public function __construct($player)
    {
        $this->player = $player;
    }

    public function upLevel()
    {
        // TODO: Implement upLevel() method.
        $this->player->upLevel();
    }
}

class Player extends IPlayer
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function upLevel()
    {
        // TODO: Implement upLevel() method.
        $this->level = 100;
    }
}


$play1 = new Player('JesBrian');
echo $play1->level . PHP_EOL;
$proxy1 = new ProxyPlayer($play1);
$proxy1->upLevel();
echo $play1->level;
