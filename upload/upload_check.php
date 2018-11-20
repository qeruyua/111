<?php
/**
 * Created by PhpStorm.
 * User: qeruyua
 * Date: 2018/11/20
 * Time: 15:49
 */
//文件过滤
function filefilter($upload_name)
{
    $flag = flase;
    $ban_ext=array("php");//黑名单
    $temp_name = explode(".",$upload_name);//将字符串打乱成数组
    $ext=end($temp_name);//取数组的最后一个
    if(in_array($ext,$ban_ext))
    {
        die("<script>alert('文件类型错误')</script>");
    }
    else
        $flag=true;
    return $flag;
}
function file_rename($upload_name)
{
    $time = date("Y-m-d H-i-s",time());
    $temp = explode(".",$upload_name);
    $ext = end($temp);
    $file = "$time.$ext";
    return $file;

}