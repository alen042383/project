<?php 
require("../model/class.crud.php");
require ("../control/btn.php");


//登入sql
if (isset($_COOKIE["username"]))
  $id = $_COOKIE["username"];
else 
  $id = "Guest";

$crud = new CRUD();
?>
<?php
// $result="SELECT * FROM product";
// $product=mysql_query($result);
$product=$crud->product();
// $row=mysql_fetch_array($product);
// $row=mysql_fetch_array($product);
    
// echo "<h4>".$row[1]."</h4>";
// }
// foreach($row as $key=>$value) {
//   var_dump($row);
// }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

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

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Shopping Life</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="About.html">About</a>
                    </li>
                    <li>
              
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">目錄</p>
                <div class="list-group">
                    
 
  
    
                     <?php if ($id == "Guest"){ ?>
                    <a href="login.php" class="list-group-item">會員登入</a>
                    <?php }else{ ?>
                     <a href="connect.php?logout=1" class="list-group-item">會員登出</a>
                      <?php } ?>
                    <a href="secret.php" class="list-group-item">會員中心</a>
                    <a href="cart.php" class="list-group-item">購物車</a>
                     <h2><?php echo "歡迎光臨 " . $id ?></h2>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="./img/Nikeim.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="./img/Nikeim2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="./img/Nikeim3.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">

<?php 
while($row=mysql_fetch_array($product)){?>
                   <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo "{$row[6]}";?>" alt="">
                            <div class="caption">
                                <h4 class="pull-right"><?php echo "{$row[2]}";?>元</h4>
                                <h4><?php echo  "{$row[1]}";?></h4>
                                
                                <h4>商品簡述:<?php echo"{$row[4]}";?>。</h4>
                                <p>商品上架時間:<?php echo"{$row[5]}";?></p>
                             
                            </div>
                            <div class="ratings">
                              
                            <h3><a href="cart.php?id=<?php echo"{$row[0]}";?>" target="_self">加入購物車</a></h3> 
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>

<?php }?>



    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
