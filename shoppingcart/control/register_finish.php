<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require("../model/class.crud.php");
$crud = new CRUD();

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$other = $_POST['other'];

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
// $sqll =  "SELECT username FROM member_table";
// $result = mysql_query($sqll);
$result=$crud->regist();

$row = mysql_fetch_array($result);
        

if($id != null && $pw != null && $pw2 != null && $pw == $pw2 )
{
      
        //新增資料進資料庫語法
        $sql = "insert into member_table (username, password, telephone, address,other) values ('$id', '$pw', '$telephone','$address','$other')";
        if(mysql_query($sql))
        {
                echo "<script>alert('新增會員成功!'); location.href='../view/login.php';</script>";
        }
        else
        {
              echo "<script>alert('新增會員失敗!'); location.href='../view/regist.php';</script>";
                
        }
}
else
{
        echo '操作錯誤!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../view/index.php>';
}

?>