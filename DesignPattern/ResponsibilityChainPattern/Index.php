<?php
/**
 * 设计模式 - 职责链模式
 *  1 - 每个处理对象决定它能处理那些命令对象，它也知道应该把自己不能处理的命令对象交下一个处理对象
 *  2 - 抽象处理者(Manager)：定义出一个处理请求的接口。如果需要，接口可以定义出一个方法，以设定和返回对下家的引用。这个角色通常由一个抽象类或接口实现
 *  3 - 具体处理者(CommonManager)：具体处理者接到请求后，可以选择将请求处理掉，或者将请求传给下家。由于具体处理者持有对下家的引用，因此，如果需要，具体处理者可以访问下家
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-06-01
 * Time: 22:07
 */


//申请Model
class Request
{
    //数量
    public $num;
    //申请类型
    public $requestType;
    //申请内容
    public $requestContent;
}

//抽象管理者
abstract class Manager
{
    protected $name;
    //管理者上级
    protected $manager;

    public function __construct($_name)
    {
        $this->name = $_name;
    }

    //设置管理者上级
    public function SetHeader(Manager $_mana)
    {
        $this->manager = $_mana;
    }

    //申请请求
    abstract public function Apply(Request $_req);

}

//经理
class CommonManager extends Manager
{
    public function __construct($_name)
    {
        parent::__construct($_name);
    }

    public function Apply(Request $_req)
    {
        if ($_req->requestType == "请假" && $_req->num <= 2) {
            echo "{$this->name}:{$_req->requestContent} 数量{$_req->num}被批准。" . PHP_EOL;
        } else {
            if (isset($this->manager)) {
                $this->manager->Apply($_req);
            }
        }

    }
}

//总监
class MajorDomo extends Manager
{
    public function __construct($_name)
    {
        parent::__construct($_name);
    }

    public function Apply(Request $_req)
    {
        if ($_req->requestType == "请假" && $_req->num <= 5) {
            echo "{$this->name}:{$_req->requestContent} 数量{$_req->num}被批准。" . PHP_EOL;
        } else {
            if (isset($this->manager)) {
                $this->manager->Apply($_req);
            }
        }

    }
}


//总经理
class GeneralManager extends Manager
{
    public function __construct($_name)
    {
        parent::__construct($_name);
    }

    public function Apply(Request $_req)
    {
        if ($_req->requestType == "请假") {
            echo "{$this->name}:{$_req->requestContent} 数量{$_req->num}被批准。" . PHP_EOL;
        } else if ($_req->requestType == "加薪" && $_req->num <= 500) {
            echo "{$this->name}:{$_req->requestContent} 数量{$_req->num}被批准。" . PHP_EOL;
        } else if ($_req->requestType == "加薪" && $_req->num > 500) {
            echo "{$this->name}:{$_req->requestContent} 数量{$_req->num}再说吧。" . PHP_EOL;
        }
    }
}


$jingli = new CommonManager("李经理");
$zongjian = new MajorDomo("郭总监");
$zongjingli = new GeneralManager("孙总");

//设置直接上级
$jingli->SetHeader($zongjian);
$zongjian->SetHeader($zongjingli);

//申请
$req1 = new Request();
$req1->requestType = "请假";
$req1->requestContent = "小菜请假！";
$req1->num = 1;
$jingli->Apply($req1);

$req2 = new Request();
$req2->requestType = "请假";
$req2->requestContent = "小菜请假！";
$req2->num = 4;
$jingli->Apply($req2);

$req3 = new Request();
$req3->requestType = "加薪";
$req3->requestContent = "小菜请求加薪！";
$req3->num = 500;
$jingli->Apply($req3);

$req4 = new Request();
$req4->requestType = "加薪";
$req4->requestContent = "小菜请求加薪！";
$req4->num = 1000;
$jingli->Apply($req4);

