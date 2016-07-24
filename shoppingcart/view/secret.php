<?php 
session_start();
require_once("../control/btn.php");
require("../model/class.crud.php");
$crud = new CRUD();
if (!isset($_COOKIE["username"]))
{
	setcookie("lastPage", "secret.php");
	header("Location: login.php");

	exit();
	
}
$orders=$crud->orders($member);
?>


<!DOCTYPE html>
<html >
 <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>會員中心</title>

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
  <form id="form1" name="form1" method="post" action="login.php">
<div class="container">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
               
                </button>
                <a class="navbar-brand" position="center" >會員中心</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
         
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
   
     

  
  <div class="col-md-9">

        <div class="row">


            <div class="col-md-5">
                 <?php if($_SESSION['username'] != null) {
                 $data =  $_SESSION["username"];
                // $result="SELECT * FROM member_table WHERE username = '$data'";
                // // $result="SELECT * FROM member_table";
                //   $member_table=mysql_query($result);
                $member_table=$crud->readmemberlist($data);
             
                  while($row = mysql_fetch_row($member_table)){
                  ?>
       
                <div class="list-group"></div>
    
                       <h2>會員基本資料</h2>
                    <h4  class="list-group-item">會員名稱:<?php echo $data ; ?></h4>
                     <h4 class="list-group-item">會員電話:<?php echo $row[3]; ?></h4>
                      <h4 class="list-group-item">會員地址:<?php echo $row[4]; ?></h4>
                       <h4 class="list-group-item">備註:<?php echo $row[5]; ?></h4>
    
                   
                   
                    <?php } ?>
                <?php 
                 $member =  $_SESSION["username"];
               $orders=$crud->orders($member);
                 while($row=mysql_fetch_row($orders)){
                     
                 
                ?>
                  <h3>會員訂單</h3>
                   <h4  class="list-group-item">訂單編號:<?php echo  $row[0] ; ?></h4>
                     <h4 class="list-group-item">訂單日期:<?php echo $row[1]; ?></h4>
                      <h4 class="list-group-item">訂單總金額:<?php echo $row[2]; ?></h4>
                <?php }}?>
  



                </div>
            </div>
 
  
      
 
  
</form>
 <div class="col-md-5">


     <form name="form" method="post"  action="../control/delet_finish.php">
    <h2>要刪除的訂單編號:</h2><input type="text" name="id" /> <br>
  
    <button type="submit" name="btnDelete" id="btnDelete" class="btn btn-primary btn-large">刪除訂單</button>
     </form>

</div>
<form id="form1" name="form1" method="post"style="position:relative;  left:510px; top: 0px;" >
    <button type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-primary btn-large">修改會員資料</button>
    <button type="submit" name="btnHome" id="btnHome" class="btn btn-primary btn-large" onclick="<?php 	setcookie("lastPage","",time()-3600);?>" >回首頁</button>
    </form>

  
</div>
 


     
</body>
</html>