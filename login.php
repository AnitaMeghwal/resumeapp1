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
  <label><b>LOGIN</b></label>
  <a style="text-decoration: none;" href="register.php"><label style="margin-left:3em;color:grey">SIGNUP</label></a>
  </div>
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>*Username:</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>*Password:</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">LOGIN</button>
  	</div>
  </form>
</body>
</html>