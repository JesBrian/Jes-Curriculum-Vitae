<?php
/**
 * 设计模式 - 命令模式
 *  1 - 接收者（Receiver）负责执行与请求相关的操作
 *  2 - 命令接口（Command）封装execute()、undo()等方法
 *  3 - 具体命令（ConcreteCommand）实现命令接口中的方法
 *  4 - 请求者（Invoker）包含Command接口变量
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-05-26
 * Time: 23:55
 */

interface ICommand
{
    function onCommand($name, $args);
}

class CommandChain
{
    private $_commands = array();

    public function addCommand($cmd)
    {
        $this->_commands [] = $cmd;
    }

    public function runCommand($name, $args)
    {
        foreach ($this->_commands as $cmd) {
            if ($cmd->onCommand($name, $args)) return;
        }
    }
}

class UserCommand implements ICommand
{
    public function onCommand($name, $args)
    {
        if ($name != 'addUser') return false;
        echo("UserCommand handling 'addUser'\n");
        return true;
    }
}

class MailCommand implements ICommand
{
    public function onCommand($name, $args)
    {
        if ($name != 'mail') return false;
        echo("MailCommand handling 'mail'\n");
        return true;
    }
}

$cc = new CommandChain();
$cc->addCommand(new UserCommand());
$cc->addCommand(new MailCommand());
$cc->runCommand('addUser', null);
$cc->runCommand('mail', null);

