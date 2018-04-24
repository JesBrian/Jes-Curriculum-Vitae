<?php
/**
 * PHP 基础 - MySQLi 数据库基本操作 - 数据库基础文件在该目录下的 test.sql
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-20
 * Time: 17:15
 */

/**
 * Notes: 数据库连接操作
 * User: JesBrian
 * Date: 2018-04-23
 * Time: 16:10
 * @param $host
 * @param $username
 * @param $passwd
 * @param $dbNamem
 * @param $port
 * @return mysqli
 */
function dbConnect($host, $username, $passwd, $dbName, $port)
{
    $dbConnect = new mysqli($host, $username, $passwd, $dbName, $port);
    if ($dbConnect->connect_error) {
        die("MySQL连接失败！" . $dbConnect->connect_error);
    } else {
        echo 'MySQL连接成功！' . PHP_EOL;
    }
    return $dbConnect;
}


/**
 * Notes: 两种 插入数据 操作 - query($sql) / prepare($sql) -> bind_param($value) -> execute()
 * User: JesBrian
 * Date: 2018-04-23
 * Time: 16:18
 * @param $dbConnect
 */
function insertOper($dbConnect)
{
    // 原生 SQL
    $sql = "INSERT INTO phpbase_test.test_tab_a(name, age) VALUES('JesBrian',21);";
    if ($dbConnect->query($sql) === true) {
        echo '插入数据成功！' . PHP_EOL;
    } else {
        echo '插入数据失败！' . $dbConnect->error;
    }

    // 参数绑定
    $prepareSql = "INSERT INTO test_tab_a(name, age) VALUES(?,?);";
    $stmt = $dbConnect->prepare($prepareSql);
    $name = 'JesBrian';
    $age = 22;
    $stmt->bind_param('ss',$name, $age);
    if ($stmt->execute() === true) {
        echo '插入数据成功！' . PHP_EOL;
    } else {
        echo '插入数据失败！' . $dbConnect->error;
    }
    $name = 'JesBrian2';
    $age = 223;
    if ($stmt->execute() === true) {
        echo '插入数据成功！' . PHP_EOL;
    } else {
        echo '插入数据失败！' . $dbConnect->error;
    }
}


/**
 * Notes: 查询操作
 * User: JesBrian
 * Date: 2018-04-23
 * Time: 16:17
 * @param $dbConnect
 */
function selectOper($dbConnect)
{

}



$host = '127.0.0.1';
$username = 'root';
$passwd = 'JesBrian';
$dbName = 'phpbase_test';
$port = '3306';

$dbConnect = dbConnect($host, $username, $passwd, $dbName, $port);
insertOper($dbConnect);

$dbConnect->close(); // 关闭数据库连接 ！！！！
