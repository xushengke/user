<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);


	require_once('phpscripts/config.php');

	//confirm_logged_in();
  if(isset($_POST['submit'])) {
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $password = md5( rand(0,5000) );//trim($_POST['password']); this will generate and
    $email = trim($_POST['email']);
    $user1v1 = $_POST['user1v1'];

      $to = $email;
      $subj = "sign up";
      $extra = "reply-to: {$email}";
      $msg = 'Name: '.$username.'
              Email: '.$email.'
              Password: '.$password.'
              Link:
              http://localhost:8888/xu_shengke_login_r2/admin/admin_login.php';
      //$direct = 'admin_index.php';
      //this will not work locally, this need to be tested on the hosting.


      mail($to, $subj, $msg, $extra);
      //echo $msg;
      //$direct = $direct."?name={$username}";
      //redirect_to($direct);
      //echo "done";


    if(empty($user1v1)) {
      $message = "Please select a user level.";
    }else{
      $result = createUser($fname, $username, $password, $email, $user1v1);
      $message = $result;
      //$sendMail = submitMessage($fname, $username, $password, $email, $user1v1);
    }
  }

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h1>welcome here!</h1>
  <?php if(!empty($message)){echo $message;}?>
  <form action="admin_createuser.php" method="post" class="formm">
    <label>First name:</label>
    <input type="text" name="fname" value="<?php if(!empty($fname)){echo $fname;}?>"><br><br>
    <label>Username:</label>
    <input type="text" name="username" value="<?php if(!empty($username)){echo $username;}?>"><br><br>
    <label>Password:</label>
    <input type="text" name="password" value="<?php if(!empty($password)){echo $password;}?>"><br><br>
    <label>Email:</label>
    <input type="text" name="email" value="<?php if(!empty($email)){echo $email;}?>"><br><br>
    <label>User Level:</label>
    <select name="user1v1">
      <option value="">Please select a user level</option>
      <option value="2">Web Admin</option>
      <option value="1">Web Master</option>
    </select><br><br>
    <input type="submit" name="submit" value="Create User">
  </form>
</body>
</html>
