<?php
/**
 * 设计模式 - 迭代器模式
 *  1 - current()  /  key()  /  next()  /  rewind()
 *  2 - 迭代器模式，在不需要了解内部实现的前提下，遍历一个聚合对象的内部元素。
 *  3 - 相比传统的编程模式，迭代器模式可以隐藏遍历元素的所需操作。
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-06-06
 * Time: 20:36
 */

class MyIterator implements Iterator
{
    private $arr = [];
    private $index = 0;

    public function __construct($arr)
    {
        if (is_array($arr)) {
            $this->arr = $arr;
        }
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        // TODO: Implement current() method.
        return $this->arr[$this->index];
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        // TODO: Implement next() method.
        $this->index++;
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        // TODO: Implement key() method.
        return $this->index;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        // TODO: Implement valid() method.
        return $this->index < count($this->arr);
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
        $this->index = 0;
    }
}

$myIterator = new MyIterator([45, 56, 7, 12, 53, 41, 45, 68, 8]);
echo $myIterator->key() . ' - ' . $myIterator->current() . PHP_EOL;
$myIterator->next();
$myIterator->next();
$myIterator->next();
echo $myIterator->key() . ' - ' . $myIterator->current() . PHP_EOL;
$myIterator->next();
$myIterator->next();
$myIterator->next();
$myIterator->next();
$myIterator->next();
$myIterator->next();
$myIterator->next();
$myIterator->next();
if ($myIterator->valid()) {
    echo $myIterator->key() . ' - ' . $myIterator->current() . PHP_EOL;
} else {
    $myIterator->rewind();
    echo $myIterator->key() . ' - ' . $myIterator->current() . PHP_EOL;
}

