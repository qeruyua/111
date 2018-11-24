<?php
/**
 * Created by PhpStorm.
 * User: qeruyua
 * Date: 2018/11/24
 * Time: 17:05
 */
include_once"sqlhelper.php";
header("Content-type: text/html;charset='utf-8'");
$mysqli = new sqlhelper();
if(isset($_GET['Iid']))
{
    $Iid = addslashes($_POST['Iid']);
    $Iname = addslashes($_POST['Iname']);
    $high = int($_POST['high']);
    $low = int($_POST['low']);
}
$sql = "UPDATE 'indi' SET 'Iname'='$Iname', 'High'= '$high','Low'= '$low' WHERE Iid='$Iid'";
$res = $mysqli->execute_dml($sql);
    if($res)
    {
        echo"<script>alert('编辑成功');
            window.location.href ='../'</script> ";
    }
    else
    {
        echo"<script>alert('编辑失败');
            window.location.href ='../'</script> ";
    }