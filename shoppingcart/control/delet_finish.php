<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require("../model/class.crud.php");
$crud = new CRUD();
$id = $_POST['id'];
if($_SESSION['username']!=NULL )
{

   //刪除資料庫資料語法

    //   $sql = "delete  from orders where id='$id'";
    //     $result="select * from `orders` where id='$id'";
    //     $username=mysql_query($result);
     $username =$crud->deletet_s($id);
        $re=mysql_fetch_array($username);
        $crud->deletet($id);
         if($id!=NULL && $_SESSION['username']==$re[3] && $id==$re[0])//避免使用者刪除其他使用者的訂單
         {
            
               
                echo "<script>alert('刪除成功!'); location.href='../view/secret.php';</script>";
        
    
         }
    
         else
        {
              
                echo "<script>alert('刪除失敗!欲刪除的訂單不存在'); location.href='../view/secret.php';</script>";
        }
}
   
?>