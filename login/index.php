<?php
/**
 * Created by PhpStorm.
 * User: qeruyua
 * Date: 2018/11/6
 * Time: 18:26
 */
include'sqlhelper.php';
include"AES.php";
date_default_timezone_set('Asia/Shanghai');
$mysqli = new sqlhelper(); //连接到数据库
if(isset($_POST['username']));
{
    $useranme = addslashes($POST['username']);
    $mysqli = new sqlhelper();
    $sql = "SELECT id,name,password FROM admin WHERE username='$username'";
    $res = $mysqli->execute_dql($sql);
    if ($res->num_rows != 0) {
        $row = $mysqli->fetch_array(MYSQLI_NUM);
        $id = $row[0];
        $name = $row[1];
        $password = $row[2];
        if ($POST['password'] ==encrypt( $password)) {
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $id;
            header("Location:admin.php");
        } else {
            echo "<script>alert('密码错误')</script>";
        }

    }
    else
        echo"<script>alert('用户名不存在')</script>";

}