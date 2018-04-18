<?php
/**
 * 数据结构 - 双链表
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-17
 * Time: 16:58
 */

class DoubleLinkedList
{
    public $node;
    public $prevNode = null;
    public $nextNode = null;

    public function __construct($node)
    {
        $this->node = $node;
    }
}

function addNode($doubleLinkedList, $node)
{
    while ($doubleLinkedList->nextNode !== null) {
        $doubleLinkedList = $doubleLinkedList->nextNode;
    }
    $node->prevNode = $doubleLinkedList;
    $node->nextNode = $doubleLinkedList->nextNode->nextNode;
    $doubleLinkedList->nextNode = $node;
}

/**
 * Notes: 有BUG - 删除边界
 * User: JesBrian
 * Date: 2018-04-18
 * Time: 8:29
 * @param $doubleLinkedList
 * @param $node
 */
function delNode($doubleLinkedList, $node)
{
    while (($doubleLinkedList->nextNode !== null) && ($doubleLinkedList->node !== $node)) {
        $doubleLinkedList = $doubleLinkedList->nextNode;
    }
    $doubleLinkedList->nextNode->prevNode = $doubleLinkedList->prevNode;
    $doubleLinkedList->prevNode->nextNode = $doubleLinkedList->nextNode;
}

function showDoubleLinkedListNode($doubleLinkedList)
{
    while ($doubleLinkedList->nextNode !== null) {
        print_r($doubleLinkedList->node . ' - ');
        $doubleLinkedList = $doubleLinkedList->nextNode;
    }
    print_r($doubleLinkedList->node . "\n" . PHP_EOL);
}


$doubleLinkedList = new DoubleLinkedList(0);
for ($i = 1; $i <= 5; $i++) {
    addNode($doubleLinkedList, new DoubleLinkedList($i));
}
showDoubleLinkedListNode($doubleLinkedList);
delNode($doubleLinkedList, 2);
delNode($doubleLinkedList, 0); // BUG
delNode($doubleLinkedList, 5); // BUG
showDoubleLinkedListNode($doubleLinkedList);


