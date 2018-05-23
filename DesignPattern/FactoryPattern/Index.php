<?php
/**
 * 设计模式 - 工厂模式
 *  1 - 创建抽象工厂类，定义具体工厂的公共接口
 *  2 - 创建抽象产品类 ，定义具体产品的公共接口
 *  3 - 创建具体产品类（继承抽象产品类） & 定义生产的具体产品
 *  4 - 创建具体工厂类（继承抽象工厂类），定义创建对应具体产品实例的方法
 *  5 - 外界通过调用具体工厂类的方法，从而创建不同具体产品类的实例
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-05-21
 * Time: 17:17
 */

interface userProperties {
    function getUsername();
    function getGender();
    function getJob();
}

interface createUser {
    function create($properties);
}

class User implements userProperties{
    private $username;
    private $gender;
    private $job;
    public function __construct($username, $gender, $job) {
        $this->username = $username;
        $this->gender = $gender;
        $this->job = $job;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getJob() {
        return $this->job;
    }
}

class userFactory {
    private $user;
    public function __construct($properties = []) {
        $this->user =  new User($properties['username'], $properties['gender'], $properties['job']);
    }

    public function getUser() {
        return $this->user;
    }
}

class FactoryMan implements createUser {
    function create($properties) {
        return new userFactory($properties);
    }
}

class FactoryWoman implements createUser {
    function create($properties) {
        return new userFactory($properties);
    }
}

class clientUser {
    static public function getManClient($properties) {
        $fac = new FactoryMan;
        $man = $fac->create($properties);
        echo $man->getUser()->getUsername() . ' - ';
        echo $man->getUser()->getGender() . ' - ';
        echo $man->getUser()->getJob();
    }
    static public function getWomanClient($properties) {
        $fac = new FactoryMan;
        $man = $fac->create($properties);
        echo $man->getUser()->getUsername() . ' - ';
        echo $man->getUser()->getGender() . ' - ';
        echo $man->getUser()->getJob();
    }
}

$employers = [
    ['username' => 'Jack', 'gender' => 'male', 'job' => 'coder'],
    ['username' => 'Marry', 'gender' => 'female', 'job' => 'designer'],
];
clientUser::getManClient($employers[0]);
echo PHP_EOL;
clientUser::getWomanClient($employers[1]);

