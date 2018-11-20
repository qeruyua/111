<?php
/**
 * Created by PhpStorm.
 * User: qeruyua
 * Date: 2018/11/6
 * Time: 17:54
 */
class sqlhelper
{
    private $mysqli;
    private static $host = "";
    private static $user = "";
    private static $pwd = "";
    private static $db = "";

    public function _construct()
    {
        $this->mysqli = new mysqli(self::$host, self::$user, self::$pwd, self::$db);
        if ($this->mysqli->connect_error)
            die("连接失败" . $this->mysqli->connect_error);
        $this->mysqli->query("set names utf8");
    }
    public function execute_dql($sql)
    {
       $res=$this->mysqli->query($sql);
       return $res;
    }
    public function execute_dml($sql)
    {
       $res = $this->mysqli->query($sql);
       if(!$res)
           return 0;
       else {
           if ($this->mysqli->affected_row > 0) {
               return 1;
           } else
               return 2;
       }
    }
    public function close_sql($sql)
    {
        $this->mysqli->close();
    }

}
?>