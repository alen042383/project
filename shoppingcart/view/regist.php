
<?php
require("../control/btn.php");


?>
   

<!DOCTYPE html>
<html >
  <head>
   	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Login Form</title>
    <link rel="stylesheet" href="css/normalize.css">
 

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Lab - Login</title>

</head>
</html>

<body>
<form id="form1" name="form1" method="post" action="../control/register_finish.php">
 <div class="login">
    <tr>
      <h1>註冊會員</h1>
    </tr>
    <tr>
    
      <td valign="baseline"><input type="text" placeholder="帳號"name="id" id="id" /></td>
    </tr>
    <tr>

      <td valign="baseline"><input type="password"placeholder="密碼" name="pw" id="pw" /></td>
    </tr>
    <tr>

      <td valign="baseline"><input type="password"placeholder="再輸入一次密碼" name="pw2" id="pw2" /></td>
    </tr>
    <tr>

      <td valign="baseline"><input type="text"placeholder="電話" name="telephone" id="telephone" /></td>
    </tr>
     <tr>

      <td valign="baseline"><input type="text"placeholder="地址" name="address" id="address" /></td>
    </tr>
  
     <h2>備註</h2><textarea name="other" cols="45" rows="5"></textarea> <br>
       <button type="submit" name="button" id="button"  class="btn btn-primary btn-large"  />確定</button>
  </form>
  <form id="form" name="form" method="post"  >
     <button type="submit" name="btnLogin" id="btnLogin"  class="btn btn-primary btn-large"  />返回</button>
     </form>
    </tr>
    </div>
  </table>

</body>

 
</html>