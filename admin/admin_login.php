<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


	require_once('phpscripts/config.php');
	$ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;
	if(isset($_POST['submit'])){
		//echo "Works";
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== ""){
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill out the required fields.";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel login</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h1>Welcome Here!</h1>
  <?php if(!empty($message))
        {echo "<p class=\"message\">{$message}</p>";}
  ?>
	<form action="admin_login.php" method="post" class="form">
		<label>Username:</label>
		<input type="text" name="username" value="">
		<br><br><br><br>
		<label>Password</label>
		<input type="password" name="password" value="">
		<br><br><br><br>
		<input type="submit" name="submit" value="login">
	</form>

</body>
</html>
