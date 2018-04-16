<?php
/**
 * 数据结构 - 单链表
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-16
 * Time: 17:57
 */

class SingleLinkedList
{
    public $node = null;
    public $nextNode = null;

    public function __construct($node)
    {
        $this->node = $node;
    }
}

function addNode($singleLinkedList, $node)
{
    while ($singleLinkedList->nextNode !== null) {
        $singleLinkedList = $singleLinkedList->nextNode;
    }
    $singleLinkedList->nextNode = $node;
    $node->nextNode = null;
}

function delNode($singleLinkedList, $node)
{
    while ($singleLinkedList->nextNode->node !== $node && $singleLinkedList->nextNode !== null) {
        $singleLinkedList = $singleLinkedList->nextNode;
    }
    $singleLinkedList->nextNode = $singleLinkedList->nextNode->nextNode;
}

function showSingleLinkedListNode($singleLinkedList)
{
    while ($singleLinkedList->nextNode !== null) {
        print_r($singleLinkedList->node . ' - ');
        $singleLinkedList = $singleLinkedList->nextNode;
    }
    print_r($singleLinkedList->node . "\n" . PHP_EOL);
}


$singleLinkedList = new SingleLinkedList(0);
for ($i = 1; $i <= 5; $i++) {
    addNode($singleLinkedList, new SingleLinkedList($i));
}
showSingleLinkedListNode($singleLinkedList);
delNode($singleLinkedList, 3);
showSingleLinkedListNode($singleLinkedList);

