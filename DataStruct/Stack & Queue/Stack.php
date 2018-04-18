<?php
/**
 * 数据结构 - 栈
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-17
 * Time: 23:41
 */

class Stack
{
    public $node;
    public function __construct($node)
    {
        $this->node = $node;
    }
}

function pushNode($stack, $node)
{

}

function popNode()
{

}


$stack = new Stack(0);
for ($i = 1; $i <= 5; $i++) {
    pushNode($stack, new Stack($i));
}



