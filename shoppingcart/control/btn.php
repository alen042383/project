<?php
if (isset($_POST["btnHome"]))
{
	header("Location: index.php");

	exit();
}
if (isset($_POST["btnCheck"]))
{
	header("Location: checkout.php");
	exit();

}

if (isset($_POST["btnSecret"]))
{
	header("Location: secret.php");
	exit();
}
if (isset($_POST["btnLogin"]))
{
	header("Location: login.php");
	exit();
}
if(isset($_POST["btnRegist"]))
{
header("Location: regist.php");

	exit();
}
if (isset($_POST["btnHome"]))
{
    
	header("Location: index.php");
	exit();
}
if (isset($_POST["btnUpdate"]))
{
    
	header("Location: update.php");
	exit();
}

if (isset($_POST["btnDelete"]))
{
    
	header("Location: view/secret.php");
	exit();
}
?>