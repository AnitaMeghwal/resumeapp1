<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<a href="#"><img src="img/logo.png" alt="logo"></a>
<div style="width: 750px; position: absolute; color: #DCDCDC;
  margin: 200px auto 0px;
  margin-left: 20px;
  font-size: 150%;">
<p>Take the first step towards showcasing your skills and work the right way!</p>
</div>
<body>
  <div class="header">
  <a style="text-decoration: none;" href="login.php"><label style="color: grey;">LOGIN</label></a>
	<label style="margin-left:3em"><b>SIGNUP</b></label>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>*Username:</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>*Email:</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>*Password:</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>*Confirm password:</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">SIGNUP</button>
  	</div>
  </form>
</body>
</html>