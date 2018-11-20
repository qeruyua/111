<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/11/6
 * Time: 19:10
 */
include "sqlhelper.php"; //包含数据库相关文件
include "AES.php";
session_start();
date_default_timezone_set('Asia/Shanghai');
$mysqli = new sqlhelper(); //连接到数据库
if (isset($_POST['username'])) {
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $password = encrypt($password);
    $sql = "INSERT INTO admin ( name,password) VALUES('$username','$password')";
    $res = $mysqli->execute_dml($sql); //执行sql语句
    if ($res!=0){
        echo "<script>alert('注册成功,请登录')</script>";
        header("Location:index.php");
    }else{
        echo "<script>alert('注册失败');</script>";
    } //包含数据库引用文件
}
?>