<?php
/**
 * Created by PhpStorm.
 * User: qeruyua
 * Date: 2018/11/20
 * Time: 10:55
 */
header("Content-type: text/html; charset=utf-8");//防止出现乱码
date_default_timezone_set("Asia/shanghai");//设置时区
include_once "../sqlhelper.php";//连接数据库
include_once "upload_check.php";//检测上传文件
$mysqli = new sqlhelper();
//上传的信息
$upload_name=$_FILES['myfile']['name'];
$upload_size=$_FILES['myfile']['size'];
$upload_tmp=$_FILES['myfile']['file_tmp'];
$time=date("Y-m-d H-i-s",time());
$target_path = '../upload/';//上传路径
if(isset($_POST['type']))
{

    $target_folder=$_POST['type'];
    $target_path = "$target_path"."$target_folder"."/";//上传路径
    if(file_filter($upload_name))//如果文件符合过滤规则
    {
        if(fiel_exists($target_path,$upload_name))
        {
            die("<script>alert('文件已存在');window.location.href = '../';
            </script>");
        }
        //上传文件
        else
        {
            move_uploadad_file($upload_tmp,$target_path."$upload_name");
        }
        $sql="insert into upload_file(name,time) values('$upload_name','$time')";//插入数据库
        $res=$mysqli->execute_dml($sql);
        if($res)
        {
            echo "<script>alert('上传成功');window.location.href='../';
               </script>";
        }
        else{
            echo"<script>alert('上传失败');
               </script>";
        }
    }
    else
    {
        die("<script> alert('非法文件');
         window.loction.href='../';</script>");
    }

}
