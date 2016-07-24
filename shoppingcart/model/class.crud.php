<?php 
session_start();
require_once("dbconfig.php");
class CRUD {
    public function __construct(){
        $db = new DB_con();
    }
   public function readmemberlist($data){
       $result="SELECT * FROM member_table WHERE username = '$data'";

       $member_table=mysql_query($result);
       return $member_table;
       
   }
   public function product(){
   $result="SELECT * FROM product";
   $product=mysql_query($result);
       return $product;
   }
   public function orders($member)
   {
    $result="SELECT * FROM orders WHERE username = '$member'";
    $orders=mysql_query($result);
    return $orders;
   }
    public function login($id)
   {
    $sql =  "SELECT * FROM member_table where username = '$id'";
    $result = mysql_query($sql);
    return $result;
   }
     public function regist()
   {
    $sqll =  "SELECT username FROM member_table";
    $result = mysql_query($sqll);
    return $result;
   }
      public function deletet_s($id)
   {
  $sql = "delete  from orders where id='$id'";
  $result="select * from `orders` where id='$id'";
   $username=mysql_query($result);
   return $username;
   }
   public function deletet($id)
   {
  $sql = "delete  from orders where id='$id'";
    mysql_query($sql);
    return $sql;
   }
    public function  update($id)
   {
      $sql = "SELECT * FROM member_table where username='$id'";
       $result = mysql_query($sql);
    return $result;
   }
   public function  update_f($id,$pw,$telephone,$address,$other)
   {
      $sql = "update member_table set password='$pw', telephone='$telephone', address='$address', other='$other' where username='$id'";
      mysql_query($sql);
    return $sql;
   }
}
?>