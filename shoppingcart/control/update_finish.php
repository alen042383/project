<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require("../model/class.crud.php");
$crud = new CRUD();
$id = $_POST['id'];
$username = $POST['username'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$other = $_POST['other'];


//紅色字體為判斷密碼是否填寫正確
if($_SESSION['username'] != null && $_SESSION['username'] ==$id  && $pw != null && $pw2 != null && $pw == $pw2)
{
      
    
        //更新資料庫資料語法
        // $sql = "update member_table set password='$pw', telephone='$telephone', address='$address', other='$other' where username='$id'";
        //mysql_query($sql)
        if($crud->update_f($id,$pw,$telephone,$address,$other))
        {
                echo '修改成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../view/secret.php>';
        }
        else
        {
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../view/secret.php>';
        }
}
else
{
        echo '操作錯誤!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
