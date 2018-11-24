<?php
/**
 * Created by PhpStorm.
 * User: qeruyua
 * Date: 2018/11/24
 * Time: 11:11
 */
include_once"sqlhelper.php";
header("Content-type: text/html; charset='utf-8'");
$mysqli = new sqlhelper();
session_start();
//得到需要删除的指标的id
$userid = $_SESSION['userid'];
$id = addslashes($_GET['Iid']);
$sql = "DELETE FROM indi WHERE id='$id'AND userid IN (SELECT userid FROM user WHERE userid='$userid' )";
$res = $mysqli->execute_dql($sql);
if($res)
{
    echo"<script>alert('删除成功');window.location.href='../';</script>";
}
else
{
    die("<script>alert('删除失败');window.location.href='../';</script>");
}
$mysqi->close_sql();