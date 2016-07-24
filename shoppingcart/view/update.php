<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require("../model/class.crud.php");
require("../control/btn.php");
?>
<!DOCTYPE html>
<html >
  <head>
   	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>更改會員資料</title>
    
    
    <link rel="stylesheet" href="css/normalize.css">

    


<body>
    <form id="form1" name="form1" method="post" action="../control/update_finish.php">
 <div class="login">
    <tr>
      <h1>修改會員資料</h1>
    </tr>
    
     <?php if($_SESSION['username'] != null){
        $crud = new CRUD();
         $id = $_SESSION['username'];
        //若以下$id直接用$_SESSION['username']將無法使用
        // $sql = "SELECT * FROM member_table where username='$id'";
        // $result = mysql_query($sql);
        $result=$crud->update($id);
        $row = mysql_fetch_row($result);
         
     ?>
     <tr>
   
    <h2>帳號<無法修改的項目></h2><td valign="baseline"><input type="text" placeholder="請輸入帳號" value="<?php echo $row[1]; ?>"name="id" id="id" /></td>
    </tr>
    <tr>
      
     <td valign="baseline"><input type="password" placeholder="請輸入密碼"value="<?php echo $row[2]; ?>" name="pw" id="pw" /></td>
    </tr>
    <tr>
    
      <td valign="baseline"><input type="password" placeholder="請輸入二次密碼" value="<?php echo $row[2]; ?>"name="pw2" id="pw2" /></td>
    </tr>
    <tr>
      
      <td valign="baseline"><input type="text"placeholder="請輸入電話號碼" value="<?php echo $row[3]; ?>"name="telephone" id="telephone" /></td>
    </tr>
    <tr>
     <td valign="baseline"><input type="text"placeholder="請輸入地址"value="<?php echo $row[4]; ?>" name="address" id="address" /></td>
      
      <td valign="baseline"><input type="text"placeholder="請輸入備註"value="<?php echo $row[5]; ?>" name="other" id="other" /></td>
    </tr>
       <button type="submit" name="button" id="button"  class="btn btn-primary btn-large"  />確定</button>
  </form>
   <form id="form1" name="form1" method="post" >
   <button type="submit" name="btnSecret" id="btnSecret"  class="btn btn-primary btn-large"  />返回</button>
</form>
 <?php  }?>

 
    </tr>
    </div>
  </table>
</body>
</html>
