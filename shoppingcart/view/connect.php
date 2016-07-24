<?php session_start();
require("../model/class.crud.php");
 if (isset($_GET["logout"]))
 {
	setcookie("username", "Guest", time()-3600);
	header("Location: index.php");
 	exit();
 }?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
$crud = new CRUD();
$id = $_POST['id'];
$pw = $_POST['pw'];


//搜尋資料庫資料
//  $sql =  "SELECT * FROM member_table where username = '$id'";

//  $result = mysql_query($sql);
//  $row = mysql_fetch_row($result);

$result=$crud->login($id);
$row = mysql_fetch_row($result);

//判斷帳號與密碼是否為空白

if($id != null && $pw != null && $row[1] == $id && $row[2] == $pw)
{
 
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['username'] = $id;

      echo '登入成功!';
       setcookie("username", $id);
      if (isset($_COOKIE["lastPage"]))
 	 header(sprintf("Location: %s", $_COOKIE["lastPage"]));
 	 
 	 		else
		   header("Location: index.php");

    
}

if($id==$row[1] && $row[2]!=$pw )
{
 echo "<script>alert('登入失敗!密碼不正確'); location.href='../view/login.php';</script>";
}

else
{
     echo "<script>alert('登入失敗!無此帳號存在'); location.href='../view/login.php';</script>";
}


?>