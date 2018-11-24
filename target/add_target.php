<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/11/21
 * Time: 21:13
 */
//添加指标
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("Asia/shanghai");
include_once"sqlhelper.php";
$mysqli=new sqlhelper();
session_start();
$userid = $_SESSION['userid'];//得到用户id
//从前端得到要添加的指标内容
$inname = addslashes($_GET['inname']);
$high = int($_GET['high']);
$low =int($_GET['low']);

$sql="INSERT INTO 'indi'('inname', 'high', 'low') VALUES ('$inname', '$high','$low')";
$res = $mysqli->execute_dml($sql);
if($res)
{
    echo"<script>alert('添加成功');window.location.href='../';</script>";
}
else
{
    die("<script>alert('添加有误');window.location.href='../';</script>");
}
$mysqli->close_sql();
