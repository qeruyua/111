<?php
/**
 * Created by PhpStorm.
 * User: qeruyua
 * Date: 2018/11/20
 * Time: 16:49
 */
//显示语法错误
ini_set("display_errors","On");
error_reporting(E_ALL | E_STRICT);
include_once "../sqlhelper.php";
$mysqli = new sqlhelper();
if($_GET['id'])
{
    $id=addslashes($_GET['id']);
    $sql="SELECT file_name FROM file WHERE id='$id'";
    $res = $mysqli->execute_dql($sql);
    $row = $res->fetch_row();
    $file = $row[0];
    if(unlink("file/$file"))
    {
        $sql2="DELETE FROM file where id='$id'";
        $res2=$mysqli->execute_dql($sql2);
        if($res2)
        {
            echo"<script>alert('删除成功');
            window.location.href ='../'</script> ";
        }
        else
        {
            echo"<script>alert('删除失败');
            window.location.href ='../'</script> ";
        }
    }
}
$mysqli->close_sql();

