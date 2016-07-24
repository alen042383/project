<?php

 session_start();
  $cart= unserialize(serialize($_SESSION['cart']));
require("../control/btn.php");
?>
 <!DOCTYPE html>
<html >
 <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shopping Life</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
               
                </button>
                <a class="navbar-brand" position="center" >我的購物車</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
         
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
 <?php

require("../model/class.crud.php");
require '../model/item.php';
$crud = new CRUD();

// var_dump($_SESSION['cart']);
// $_SESSION['cart'];
if(isset($_GET['id']))
 {
$id=$_GET['id'];
$sql = "select * from product WHERE id = $id";
$result= mysql_query($sql);
$product=mysql_fetch_object($result);
$item=new item();
$item->id=$product->id;
$item->name=$product->name;
$item->price=$product->price;
$item->image=$product->image;
$item->quantity=1;
$index= -1;
$cart = unserialize(serialize($_SESSION['cart']));
for($i=0;$i<count($cart);$i++)
  if($cart[$i]->id==$_GET['id'])
  { 
    $index = $i;
    break;
  }

 if($index==-1)
  $_SESSION['cart'][]=$item;
    else
    {
     $cart[$index]->quantity++;
     $_SESSION['cart']=$cart;
      }

  }
  if(isset($_GET['index']))
  {
   $cart = unserialize(serialize($_SESSION['cart']));
   unset($cart[$_GET['index']]);
   $cart = array_values($cart);
   $_SESSION['cart']=$cart;
   }

 ?>
 <div class="pull-center">
 <table cellpading="4" cellspacing="4" border="5" lenght width="600" height="100"align ="center">
  <tr>
         <th>功能</th>
         <th>商品圖示</th>
         <th>編號</th>
         <th>商品名稱</th>
         <th>價錢</th>
         <th>數量</th>
         <th>Sub Total</th>
   </tr>
   
  <?php
  $cart= unserialize(serialize($_SESSION['cart']));
   $s =0;
   $index =0;
   for($i=0; $i<count($cart); $i++){
       $s +=$cart[$i]->price * $cart[$i]->quantity;
  ?>
  <tr>
      <td><a  href="cart.php?index=<?php echo $index;?>" onclick="retrun confirm('確定要刪除?')"; >delete</a></td> 
      <td> <img src="<?php echo $cart[$i]->image;?>"width="100" height="100"></td>
      <td><?php echo $cart[$i]->id;?></td>
       <td><?php echo $cart[$i]->name;?></td>
       <td><?php echo $cart[$i]->price;?></td>
      <td><?php echo $cart[$i]->quantity;?></td>
      <td><?php echo $cart[$i]->price * $cart[$i]->quantity;?></td>
  </tr>
   
     <?php 
     $index++;
    
     }
     ?>
     <tr>
      <td colspan="6" align="right">小計</td>
      <td align="left"><?php echo $s;?></td>
      
     </tr>
 
    
 </table>
 </div>
 <form id="form1" name="form1" method="post">
    	 <button type="submit" name="btnHome" id="btnHome"  class="btn btn-primary btn-large" style="position:relative;  left:520px; top: 0px;">繼續購物</button>
    	 <button type="submit" name="btnCheck" id="btnCheck"  class="btn btn-primary btn-large" style="position:relative;  left:610px; top: 0px;" >結帳</button>
    	 </form>
    	
 </body>
 </html>