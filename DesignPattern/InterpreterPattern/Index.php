<?php
/**
 * 设计模式 - 解释器模式
 *  1 - 给定一个语言, 定义它的文法的一种表示，并定义一个解释器，该解释器使用该表示来解释语言中的句子 （四则运算）
 *  2 - 环境角色：定义解释规则的全局信息
 *  3 - 抽象解释器：定义了部分解释具体实现，封装了一些由具体解释器实现的接口
 *  4 - 具体解释器(MusicNote)：实现抽象解释器的接口，进行具体的解释执行
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-06-25
 * Time: 22:24
 */


//环境角色，定义要解释的全局内容
class Expression
{
    public $content;

    function getContent()
    {
        return $this->content;
    }
}

//抽象解释器
abstract class AbstractInterpreter
{
    abstract function interpret($content);
}

//具体解释器,实现抽象解释器的抽象方法
class ChineseInterpreter extends AbstractInterpreter
{
    function interpret($content)
    {
        for ($i = 1; $i < count($content); $i++) {
            switch ($content[$i]) {
                case '0':
                    echo "没有人\n";
                    break;
                case "1":
                    echo "一个人\n";
                    break;
                case "2":
                    echo "二个人\n";
                    break;
                case "3":
                    echo "三个人\n";
                    break;
                case "4":
                    echo "四个人\n";
                    break;
                case "5":
                    echo "五个人\n";
                    break;
                case "6":
                    echo "六个人\n";
                    break;
                case "7":
                    echo "七个人\n";
                    break;
                case "8":
                    echo "八个人\n";
                    break;
                case "9":
                    echo "九个人\n";
                    break;
                default:
                    echo "其他";
            }
        }
    }
}

class EnglishInterpreter extends AbstractInterpreter
{
    function interpret($content)
    {
        for ($i = 1; $i < count($content); $i++) {
            switch ($content[$i]) {
                case '0':
                    echo "This is nobody\n";
                    break;
                case "1":
                    echo "This is one people\n";
                    break;
                case "2":
                    echo "This is two people\n";
                    break;
                case "3":
                    echo "This is three people\n";
                    break;
                case "4":
                    echo "This is four people\n";
                    break;
                case "5":
                    echo "This is five people\n";
                    break;
                case "6":
                    echo "This is six people\n";
                    break;
                case "7":
                    echo "This is seven people\n";
                    break;
                case "8":
                    echo "This is eight people\n";
                    break;
                case "9":
                    echo "This is nine people\n";
                    break;
                default:
                    echo "others";
            }
        }
    }
}

//封装好的对具体解释器的调用类,非解释器模式必须的角色
class Interpreter
{
    private $interpreter;
    private $content;

    function __construct($expression)
    {
        $this->content = $expression->getContent();
        if ($this->content[0] == "Chinese") {
            $this->interpreter = new ChineseInterpreter();
        } else {
            $this->interpreter = new EnglishInterpreter();
        }
    }

    function execute()
    {
        $this->interpreter->interpret($this->content);
    }
}

//测试
$expression = new Expression();
$expression->content = array("Chinese", 3, 2, 4, 4, 5);
$interpreter = new Interpreter($expression);
$interpreter->execute();

$expression = new Expression();
$expression->content = array("English", 1, 2, 3, 0, 0);
$interpreter = new Interpreter($expression);
$interpreter->execute();
