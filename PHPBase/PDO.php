<?php
/**
 * PHP 基础 - PDO 操作数据库
 *  exec(sql) - 执行SQL返回受影响行数(select无效),错误返回false,可以使用errorCode()和errorInfo()获取错误信息
 *  query(sql) - 执行SQL返回PDOStatement对象
 *  prepare(sql) - 准备要执行的SQL返回PDOStatement对象
 *  lastInsertId() - 返回最后插入行的ID
 *
 *  setAttribute() - 设置数据库连接属性
 *  getAttribute() - 得到数据库连接属性
 *  errorCode() - 获取数据库上一次操作的SQLSTATE
 *  errorInfo() - 获取数据库上一次操作的错误信息
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-20
 * Time: 18:23
 */


/**
 * Notes: PDO 数据库连接
 * User: JesBrian
 * Date: 2018-07-21
 * Time: 13:24
 * @param $dsn
 * @param $username
 * @param $passwd
 * @return PDO
 */
function pdoConnect($dsn, $username, $passwd)
{
    try {
        return new PDO($dsn, $username, $passwd);
    }catch (PDOException $exception) {
        echo $exception->getMessage();
    }
}


/**
 * Notes: PDO 数据库插入
 * User: JesBrian
 * Date: 2018-07-21
 * Time: 13:38
 * @param $pdoConnect
 */
function pdoInsert($pdoConnect)
{
    $sql = "INSERT INTO phpbase_test.test_tab_a(name, age) VALUES('JesBrian',21);";
    var_dump($pdoConnect->exec($sql));
}


/**
 * Notes: PDO 数据库更新
 * User: JesBrian
 * Date: 2018-07-21
 * Time: 13:38
 * @param $pdoConnect
 */
function pdoUpdate($pdoConnect)
{
    $sql = "UPDATE phpbase_test.test_tab_a SET name = 'JesBrian666' WHERE id > 6;";
    var_dump($pdoConnect->exec($sql));
}


/**
 * Notes: PDO 数据库删除
 * User: JesBrian
 * Date: 2018-07-21
 * Time: 16:52
 * @param $pdoConnect
 */
function pdoDelete($pdoConnect)
{
    $sql = "DELETE FROM phpbase_test.test_tab_a WHERE id > 7;";
    var_dump($pdoConnect->exec($sql));
}


/**
 * Notes: PDO 数据库查询
 * User: JesBrian
 * Date: 2018-07-21
 * Time: 16:53
 * @param $pdoConnect
 */
function pdoSelect($pdoConnect)
{
    $sql = "SELECT * FROM phpbase_test.test_tab_a";
    $stmt = $pdoConnect->query($sql);
    foreach ($stmt as $row) {
        var_dump($row);
    }
}


$dsn = 'mysql:host=127.0.0.1;dbname=phpbase_test'; // 可以不写dbname数据库名称
$username = 'root';
$passwd = 'JesBrian';

$pdoConnect = pdoConnect($dsn, $username, $passwd);
//var_dump($pdoConnect);


//pdoInsert($pdoConnect);
//pdoUpdate($pdoConnect);
//pdoDelete($pdoConnect);
pdoSelect($pdoConnect);

