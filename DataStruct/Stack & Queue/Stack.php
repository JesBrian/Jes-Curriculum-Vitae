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
    private $stack = [];
    private $nowIndex = -1;
    private $maxNodeNum = 8;

    public function pushNode($node)
    {
        if ($this->nowIndex < ($this->maxNodeNum - 1)) {
            array_push($this->stack, $node);
            $this->nowIndex++;
        }
    }

    function popNode()
    {
        if ($this->nowIndex > -1) {
            return array_pop($this->stack);
        }
    }
}

$stack = new Stack();
for ($i = 0; $i <= 5; $i++) {
    $stack->pushNode($i);
}
print_r($stack->popNode());



