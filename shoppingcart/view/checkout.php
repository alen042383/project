
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();

       
if($_SESSION['cart']==NULL)
{
    echo "<script>alert('購物車不能為空的!'); location.href='cart.php';</script>";
  
    exit();
    
}

require("../model/class.crud.php");
require '../model/item.php';
$crud = new CRUD();

 if (!isset($_COOKIE["username"]))
 {
 	setcookie("lastPage", "cart.php");
	
	header("Location: login.php");
 
     
 	exit();
	
 }


//
$cart = unserialize(serialize($_SESSION['cart']));
 $s =0;

for($i=0; $i<count($cart);$i++)
{
     $s +=$cart[$i]->price * $cart[$i]->quantity;


    
}
mysql_query('insert into orders(datecreation,subtotal,username) 
    values("'.date('y-m-d H:i:s').'","'.$s.'","'.$_COOKIE["username"].'")');
   echo "<script>alert('訂單已送出!'); location.href='cart.php';</script>";
   unset ($_SESSION['cart']);
?>
 