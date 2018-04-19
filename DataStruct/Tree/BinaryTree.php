<?php
/**
 * 数据结构 - 二叉树
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-18
 * Time: 16:24
 */

class BinaryTreeNode
{
    public $nodeValue;
    public $leftChil = null;
    public $rightChil = null;
    public function __construct($nodeValue)
    {
        $this->nodeValue = $nodeValue;
    }
}

/**
 * Notes: 先序遍历 - 堆栈实现，后输出先入栈 [ 右子树先入栈 / 再左子树入栈 ]
 * User: JesBrian
 * Date: 2018-04-19
 * Time: 8:32
 * @param $rootNode
 */
function prevOrder($rootNode)
{
    $stack = [];
    array_push($stack, $rootNode);
    while (!empty($stack)) {
        $nowNode = array_pop($stack);
        echo $nowNode->nodeValue . ' '; // 输出节点
        if ($nowNode->rightChil != null) {
            array_push($stack, $nowNode->rightChil);//压入右子树
        }
        if ($nowNode->leftChil != null) {
            array_push($stack, $nowNode->leftChil);
        }
    }
    echo PHP_EOL;
}

/**
 * Notes: 中序遍历 - 堆栈实现，后输出先入栈 []
 * User: JesBrian
 * Date: 2018-04-19
 * Time: 8:33
 * @param $rootNode
 */
function inOrder($rootNode)
{
    $stack = [];
    $nowNode = $rootNode;
    while (!empty($stack) || $nowNode !== null) {
        while ($nowNode !== null) {
            array_push($stack, $nowNode);
            $nowNode = $nowNode->leftChil;
        }
        $nowNode = array_pop($stack);
        echo $nowNode->nodeValue . ' '; // 输出节点
        $nowNode = $nowNode->rightChil;
    }
}

/**
 * Notes: 后序遍历 - 堆栈实现，后输出先入栈 []
 * User: JesBrian
 * Date: 2018-04-19
 * Time: 8:33
 * @param $rootNode
 */
function tailOrder($rootNode)
{

}


$a = new BinaryTreeNode(0);
$b = new BinaryTreeNode(1);
$c = new BinaryTreeNode(2);
$d = new BinaryTreeNode(3);
$e = new BinaryTreeNode(4);
$f = new BinaryTreeNode(5);
$a->leftChil = $b;
$a->rightChil = $c;
$b->leftChil = $d;
$c->leftChil = $e;
$c->rightChil = $f;

//prevOrder($a);
inOrder($a);

