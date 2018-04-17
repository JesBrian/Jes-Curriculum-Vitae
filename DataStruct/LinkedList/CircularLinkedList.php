<?php
/**
 * 数据结构 - 循环链表
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-16
 * Time: 21:08
 */

class CircularLinkedList
{
    public $node;
    public $nextNode = null;
    public function __construct($node)
    {
        $this->node = $node;
    }
}

function addNode($circularLinkedList, $node)
{
    $headValue = $circularLinkedList->node;
    $head = $circularLinkedList;
    if ($circularLinkedList->nextNode !== null) {
        while ($circularLinkedList->nextNode->node !== $headValue) {
            $circularLinkedList = $circularLinkedList->nextNode;
        }
    }
    $circularLinkedList->nextNode = $node;
    $node->nextNode = $head;
}

/**
 * Notes: 等待优化 - 只有一个元素怎么办
 * User: JesBrian
 * Date: 2018-04-17
 * Time: 15:59
 * @param $circularLinkedList
 * @param $node
 */
function delNode($circularLinkedList, $node)
{
    $headValue = $circularLinkedList->node;
    while (($circularLinkedList->node !== $node) && ($circularLinkedList->nextNode->node !== $headValue)) {
        $circularLinkedList = $circularLinkedList->nextNode;
    }
    $circularLinkedList->node = $circularLinkedList->nextNode->node;
    $circularLinkedList->nextNode = $circularLinkedList->nextNode->nextNode;
}

function showCircularLinkedListNode($circularLinkedList)
{
    $headValue = $circularLinkedList->node;
    while ($circularLinkedList->nextNode->node !== $headValue) {
        print_r($circularLinkedList->node . ' - ');
        $circularLinkedList = $circularLinkedList->nextNode;
    }
    print_r($circularLinkedList->node . "\n" . PHP_EOL);
}


$circularLinkedList = new CircularLinkedList(0);
for ($i = 1; $i <= 5; $i++) {
    addNode($circularLinkedList, new CircularLinkedList($i));
}
showCircularLinkedListNode($circularLinkedList);
delNode($circularLinkedList, 3);
showCircularLinkedListNode($circularLinkedList);