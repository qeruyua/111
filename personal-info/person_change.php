<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/3
 * Time: 21:06
 */
include_once "sqlhelper.php";
header("Content-type:text\html;charset=utf-8");
session_start();
$mysqli = new sqlhelper();
if(isset($_POST['username']))
{
    $name = addslashes($_POST['username']);
    $id = addslashes($_SESSION['id']);
    $sql="UPDATE user SET username = '$name'where id = '$id'";
    $res1=$mysqli->execute_dql($sql);
    if($res)
        echo"<script>alert('更改成功')</script>";
}
if (isset($_POST['password']))
{
    $oldpwd =md5(trim( $_POST['oldpassword']));
    $newpwd =md5(trim( $_POST['newpassword']));
    if($_SESSION['password']==$oldpwd)
    {
        $sql="UPDATE user SET password = '$newpwd'where id = '$id'";
        $res2=$mysqli->execute_dql($sql);
    }

}
if($res1&&!$res2)
    echo"<script>alert('用户名更改成功')</script>";
else if(!$res1&&$res2)
    echo"<script>alert('密码名更改成功')</script>";
else if($res1&&$res2)
    echo"<script>alert('更改成功')</script>";
