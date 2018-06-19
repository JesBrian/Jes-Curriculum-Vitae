<?php
/**
 * PHP 基础 - 错误与异常
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-20
 * Time: 17:18
 */

/**
 * 1、定义异常类 - 继承 Exception
 * 2、getFile() / getLine() / getCode() / getMessage()
 * 3、try - catch - finally
 */

class EmailException extends Exception
{
    public function __toString()
    {
        return 'email is null !!!' . PHP_EOL . 'File: ' . $this->getFile() . "\nLine: " . $this->getLine() . PHP_EOL;
    }
}
class UsernameException extends Exception
{
    public function __toString()
    {
        return 'username is null !!!' . "\nMessage: " . $this->getMessage() . "\nFile: " . $this->getFile() . "\nLine: " . $this->getLine() . "\nCode: " . $this->getCode() . PHP_EOL;
    }
}



function checkData($data)
{
    if ($data) {
        if ($data['email'] === '') {
            throw new EmailException('666',8);
        }
        if ($data['username'] === '') {
            throw new UsernameException();
        }
    }
}

$data = [
    'email' => '666',
    'username' => '++'
];
try {
    checkData($data);
} catch (EmailException $e) {
//    echo $e;
    echo $e->getMessage() . PHP_EOL;
    echo $e->getCode() . PHP_EOL;
} catch (UsernameException $e) {
    echo $e;
} finally {
    echo 'finally';
}


/**
 * 记录错误 - 日志
 */
if (!new mysqli('127.0.0.1', 'root', 'errorpasswd', 'test')) {
    error_log('MySQL connect error !', 0,'./error.log');
}


/**
 * 自定义错误处理函数
 * 必须传入参数 $errno - 错误的代码 / $errstr - 错误信息 / $errfile - 错误文件 / $errline - 错误行数
 */
function errorHandler($errno, $errstr, $errfile, $errline)
{
    echo 'Code: ' . $errno . "\nMessage: " . $errstr . "\nFile: " . $errfile . "\nLine: " . $errline;
}
set_error_handler('errorHandler');
strpos();

