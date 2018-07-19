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
 * Notes: 两种 插入数据 操作 - query($sql) / prepare($prepareSql) -> bind_param($paramNum, $value) -> execute()
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
 * Notes: 更新操作
 * User: JesBrian
 * Date: 2018-04-26
 * Time: 15:02
 * @param $dbConnect
 */
function updateOper($dbConnect)
{
    $sql = "UPDATE phpbase_test.test_tab_a SET name = 'JesBrian666' WHERE id = 16;";
    if ($dbConnect->query($sql) === true) {
        echo '修改数据成功！' . PHP_EOL;
    } else {
        echo '修改数据失败！' . $dbConnect->error;
    }

    $prepareSql = "UPDATE phpbase_test.test_tab_a SET name = ? WHERE id = ?;";
    $stmt = $dbConnect->prepare($prepareSql);
    $username = 'JesBrian888';
    $userId = 15;
    $stmt->bind_param('ss', $username, $userId);
    if ($stmt->execute() === true) {
        echo '修改数据成功！' . PHP_EOL;
    } else {
        echo '修改数据失败！' . $dbConnect->error;
    }
    $username = "JesBrian999";
    $userId = 19;
    if ($stmt->execute() === true) {
        echo '修改数据成功！' . PHP_EOL;
    } else {
        echo '修改数据失败！' . $dbConnect->error;
    }
}


/**
 * Notes: 删除数据操作
 * User: JesBrian
 * Date: 2018-04-26
 * Time: 15:20
 * @param $dbConnect
 */
function delOper($dbConnect)
{
    $sql = "DELETE FROM phpbase_test.test_tab_a WHERE phpbase_test.test_tab_a.id = 42;";
    if ($dbConnect->query($sql) === true) {
        echo '删除数据成功！' . PHP_EOL;
    } else {
        echo '删除数据失败！' . $dbConnect->error;
    }

    $prepareSql = "DELETE FROM phpbase_test.test_tab_a WHERE phpbase_test.test_tab_a.id = ?;";
    $userId = 43;
    $stmt = $dbConnect->prepare($prepareSql);
    $stmt->bind_param('s', $userId);
    if ($stmt->execute() === true) {
        echo '删除数据成功！' . PHP_EOL;
    } else {
        echo '删除数据失败！' . $dbConnect->error;
    }
    $userId = 45;
    if ($stmt->execute() === true) {
        echo '删除数据成功！' . PHP_EOL;
    } else {
        echo '删除数据失败！' . $dbConnect->error;
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
    $sql = "SELECT * FROM phpbase_test.test_tab_a";
    $result = $dbConnect->query($sql);
    // 参数主要使用： MYSQLI_ASSOC, MYSQLI_NUM, MYSQLI_BOTH
    //fetch_all() 抓取所有的结果行并且以关联数据，数值索引数组，或者两者皆有的方式返回结果集。
    //fetch_array() 以一个关联数组，数值索引数组，或者两者皆有的方式抓取一行结果。
    //fetch_object() 以对象返回结果集的当前行。
    //fetch_row() 以枚举数组方式返回一行结果 [ 只查询一条记录 ]
    //fetch_assoc() 以一个关联数组方式抓取一行结果。
    //fetch_field_direct() 以对象返回结果集中单字段的元数据。
    //fetch_field()	以对象返回结果集中的列信息。
    //fetch_fields() 以对象数组返回代表结果集中的列信息。
    $row = $result->fetch_assoc();
    var_dump($row);

//    $id = 0;
//    $name = '';
//    $age = 0;
//    $prepSql = "SELECT * FROM phpbase_test.test_tab_a WHERE phpbase_test.test_tab_a.id = ? AND phpbase_test.test_tab_a.name = ?";
//    $stmt = $dbConnect->prepare($prepSql);
//    $stmt->bind_param('is', 3, '3');
//    //绑定结果集
//    $stmt->bind_result($id, $name, $age);
//    //执行
//    $stmt->execute();
//    //取出绑定的结果集
//    while($stmt->fetch()){
//        echo "--$id--$name--$age--\r";
//    }
}


$host = '127.0.0.1';
$username = 'root';
$passwd = 'JesBrian';
$dbName = 'phpbase_test';
$port = '3306';

$dbConnect = dbConnect($host, $username, $passwd, $dbName, $port);
//insertOper($dbConnect);
//updateOper($dbConnect);
//delOper($dbConnect);
selectOper($dbConnect);

$dbConnect->close(); // 关闭数据库连接 ！！！！
