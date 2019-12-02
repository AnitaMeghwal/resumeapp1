<?php
if(isset($_GET['ID'])){
	$username= $_GET['ID'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<a href="#"><img src="img/logo.png" alt="logo" style="max-width:15%; 
  height:auto; position: absolute; margin: 5px auto 0px; margin-left: 5px; "></a>
<body style="background: #F8F8F8;">
	<?php
	$db = mysqli_connect('localhost', 'root', '', 'registration');
   ?>
  <div style="width: 100%; color: blue; height: 60px;  margin: 0px auto 0px;  margin-left: 0px; background: #404040;  font-size: 150%; border-radius: 0px 0px 0px 0px;" class="header">
</div>

<div class="content" style="position: absolute;max-width:25%; margin: 20px; border-radius: 4px 4px 0px 0px; border: 1px solid #D3D3D3; text-align: center;">



<a href="#"><img src="img/userlogo.png" alt="userlogo" style="max-width:50%;height:auto;"></a>
  	<!-- notification message -->
    
  	<!-- logged in user information -->
     
    <p ><strong>
    	<?php 
  $query = "SELECT * FROM profile_details WHERE username='$username';";
  $result = mysqli_query($db, $query);
  $resultcheck = mysqli_num_rows($result); 
    	if($resultcheck>0)
    	{
    		$userres= mysqli_fetch_assoc($result);
 			 echo $userres['fullname'];
    	}

?>
    	</strong></p>
    

</div>


<div style="position: absolute; width: 335px; margin: 20px;margin-top: 190px; border-radius: 0px 0px 4px 4px; border: 1px solid #D3D3D3;border: 1px solid #D3D3D3; background:white; color: #808080;">
<br>
  <i style="position: absolute; font-size:15px; margin: 10px; margin-left: 30px; " class="fa">&#xf0e0;</i>
  <p style="margin-top:5px; margin-left: 50px;font-size:20px;">
  <?php
  $query = "SELECT * FROM profile_details WHERE username='$username';";
  $result = mysqli_query($db, $query);
  $resultcheck = mysqli_num_rows($result);
  $userres= mysqli_fetch_assoc($result);
  echo $userres['email'];
  ?>
  </p>
  <br>
  <i style="font-size:24px; margin: 10px; margin-left: 30px;" class="fa">&#xf10b;</i>
  <label style="text-align: left;font-size:20px;">
  <?php
  echo $userres['phone'];
  ?>
  <br>
  </label>
  <i style="font-size:20px; margin: 10px; margin-left: 30px;" class="fa">&#xf041;</i>
  <label style="text-align: left;font-size:20px;">
  <?php
  echo $userres['location'];
  ?>
  </label>
</div>


<div class="content" style=" width:65%; margin: 20px; margin-left: 400px; border-radius: 4px 4px 0px 0px; border: 1px solid #D3D3D3;">
  <i style="position: absolute; font-size:24px; margin-left:10px; color: #FF6600;" class='fas'>&#xf007;</i>
  
  <h3 style="margin-left: 50px;">Profile Overview</h3>
</div>
<div class="content" style=" width:65%; margin-top: -22px; margin-left: 400px; border-radius: 0px 0px 4px 4px; border: 1px solid #D3D3D3; color: #808080;">
<?php
  $query2 = "SELECT * FROM profile_overview WHERE username='$username';";
  $result2 = mysqli_query($db, $query2);
  $userres2= mysqli_fetch_assoc($result2);
  echo $userres2['overview'];
  ?>	
</div>


<div class="content" style="position: absolute; width:25%; margin: 20px; margin-top: 280px; border-radius: 4px 4px 0px 0px; border: 1px solid #D3D3D3;">
  	
   <h3>Highlights</h3>
</div>
<div class="content" style="position: absolute; width:25%; margin: 20px; margin-top: 325px; border-radius: 0px 0px 4px 4px; border: 1px solid #D3D3D3;">
	<?php
  $query3 = "SELECT * FROM highlights WHERE username='$username';";
  $result3 = mysqli_query($db, $query3);
  $userres3= mysqli_fetch_assoc($result3);
  echo $userres3['skills'];
  ?>
  	</div>


<div class="content" style=" width:65%; margin: 20px; margin-left: 400px; border-radius: 4px 4px 4px 4px; border: 1px solid #D3D3D3;">
  <i style="position: absolute; font-size:24px; margin-left:10px; color: #FF6600;" class='fas'>&#xf0b1;</i>
	
  <h3 style="margin-left: 50px;">Experience and Projects</h3>
</div>	

<?php
  $query4 = "SELECT * FROM experience WHERE username='$username';";
  $result4 = mysqli_query($db, $query4);
  //$userres3= mysqli_fetch_assoc($result3);
 // echo $userres3['skills'];
  ?>

<?php while($row=mysqli_fetch_assoc($result4)) { ?>
<div class="content" style=" width:65%; margin-top: -22px; margin-left: 400px; border-radius: 0px 0px 4px 4px; border: 1px solid #D3D3D3; color: #808080;">
	
	<div class="header" style="margin:0px; background :#F0F0F0;border: 1px solid #D3D3D3; color: #808080; width:95%; border-radius: 4px 4px 0px 0px;text-align: left;">
		<label style="text-align: left;color: black;"><?php echo $row['title']; ?></label>
		<i style="font-size:14px;margin-left: 400px;" class="fa">&#xf073;</i>
		<label style="font-size:14px;text-align: left;"><?php echo $row['startdate']; ?> to <?php echo $row['enddate']; ?></label>
		<br>
		<i style="font-size:14px" class="fa">&#xf1ad;</i>
		<label style="font-size:14px;text-align: left;"><?php echo $row['company']; ?></label>&nbsp;&nbsp;
		<i style="font-size:14px" class="fa">&#xf041;</i>
		<label style="font-size:14px;text-align: left;"><?php echo $row['location']; ?></label>
		
	</div>
	<form method="post" class="content" style="width: 95%;margin:0px;margin-top: -1px; border: 1px solid #D3D3D3; color: #808080;border-radius: 0px 0px 4px 4px;"><p style="font-size:14px;text-align: left;"><?php echo $row['description']; ?></p>
		<br>
	</form>
	
</div>
<?php }?>

<?php
  $query5 = "SELECT * FROM project WHERE username='$username';";
  $result5 = mysqli_query($db, $query5);
 ?>

 <?php while($row1=mysqli_fetch_assoc($result5)) { ?>
<div class="content" style=" width:65%; margin-top: -22px; margin-left: 400px; border-radius: 0px 0px 4px 4px; border: 1px solid #D3D3D3; color: #808080;">
	
	<div class="header" style="margin:0px; background :#F0F0F0;border: 1px solid #D3D3D3; color: #808080; width:95%; border-radius: 4px 4px 0px 0px;text-align: left;">
		<label style="text-align: left; color: black;">Project</label>
	</div>
	<form method="post" class="content" style="width: 95%;margin:0px;margin-top: -1px; border: 1px solid #D3D3D3; color: #808080;border-radius: 0px 0px 4px 4px;">
		<label style="text-align: left;color: black;"><?php echo $row1['title']; ?></label>
		<i style="font-size:14px;margin-left: 400px;" class="fa">&#xf073;</i>
		<label style="font-size:14px;text-align: left;"><?php echo $row1['startdate']; ?> to <?php echo $row1['enddate']; ?></label>
		<br>
		<label style="text-align: left;color: black;"><?php echo $row1['skills']; ?></label>
		<p style="font-size:14px;text-align: left;"><?php echo $row1['description']; ?></p>
		<br>
	</form>
	
</div>
<?php }?>


<div class="content" style=" width:65%; margin: 20px; margin-left: 400px; border-radius: 4px 4px 4px 4px; border: 1px solid #D3D3D3;">
  <i style="position: absolute; font-size:24px; margin-left:10px; color: #FF6600;" class='fas'>&#xf5da;</i>

 
    <?php
    if (isset($_POST['edu_data'])) {
	$degree= mysqli_real_escape_string($db, $_POST['degree']);
	$institute = mysqli_real_escape_string($db, $_POST['institute']);
	$eduloc = mysqli_real_escape_string($db, $_POST['eduloc']);
	$edustartdate = mysqli_real_escape_string($db, $_POST['edustartdate']);
	$eduenddate = mysqli_real_escape_string($db, $_POST['eduenddate']);
	$edudesc = mysqli_real_escape_string($db, $_POST['edudesc']);
	$query6 = "INSERT INTO education (username, degree, institute, location, startdate, enddate, description) 
  			  VALUES('$username', '$degree', '$institute', '$eduloc', '$edustartdate', '$eduenddate', '$edudesc');";
  	mysqli_query($db, $query6);
  	}
  	?>
   

  <h3 style="margin-left: 50px;">Education</h3>
</div>
<?php
  $query6 = "SELECT * FROM education WHERE username='$username';";
  $result6 = mysqli_query($db, $query6);
 ?>
 <?php while($row2=mysqli_fetch_assoc($result6)) { ?>
<div class="content" style=" width:65%; margin-top: -22px; margin-left: 400px; border-radius: 0px 0px 4px 4px; border: 1px solid #D3D3D3; color: #808080;">
	
	<div class="header" style="margin:0px; background :#F0F0F0;border: 1px solid #D3D3D3; color: #808080; width:95%; border-radius: 4px 4px 0px 0px;text-align: left;">
		<label style="text-align: left;color: black;"><?php echo $row2['degree']; ?></label>
		<i style="font-size:14px;margin-left: 400px;" class="fa">&#xf073;</i>
		<label style="font-size:14px;text-align: left;"><?php echo $row2['startdate']; ?> to <?php echo $row2['enddate']; ?></label>
		<br>
		<i style="font-size:14px" class="fa">&#xf1ad;</i>
		<label style="font-size:14px;text-align: left;"><?php echo $row2['institute']; ?></label>&nbsp;&nbsp;
		<i style="font-size:14px" class="fa">&#xf041;</i>
		<label style="font-size:14px;text-align: left;"><?php echo $row2['location']; ?></label>
	</div>
	<form method="post" class="content" style="width: 95%;margin:0px;margin-top: -1px; border: 1px solid #D3D3D3; color: #808080;border-radius: 0px 0px 4px 4px;"><p style="font-size:14px;text-align: left;"><?php echo $row2['description']; ?></p>
		<br>
	</form>
</div>
<?php }?>


<div class="content" style=" width:65%; margin: 20px; margin-left: 400px; border-radius: 4px 4px 4px 4px; border: 1px solid #D3D3D3;">
  <i style="position: absolute; font-size:24px; margin-left:10px; color: #FF6600;" class='fas'>&#xf0a3;</i>
  
  
  <h3 style="margin-left: 50px;">Certifications</h3>
</div>
<?php
  $query7 = "SELECT * FROM certification WHERE username='$username';";
  $result7 = mysqli_query($db, $query7);
 ?>
 <?php while($row3=mysqli_fetch_assoc($result7)) { ?>
<div class="content" style=" width:65%; margin-top: -22px; margin-left: 400px; border-radius: 0px 0px 4px 4px; border: 1px solid #D3D3D3; color: #808080;">
	
	<div class="header" style="margin:0px; background :#F0F0F0;border: 1px solid #D3D3D3; color: #808080; width:95%; border-radius: 4px 4px 0px 0px;text-align: left;">
		<label style="text-align: left;color: black;"><?php echo $row3['degree']; ?></label>
		<i style="font-size:14px;margin-left: 400px;" class="fa">&#xf073;</i>
		<label style="font-size:14px;text-align: left;"><?php echo $row3['startdate']; ?> to <?php echo $row3['enddate']; ?></label>
		<br>
		<i style="font-size:14px" class="fa">&#xf1ad;</i>
		<label style="font-size:14px;text-align: left;"><?php echo $row3['institute']; ?></label>&nbsp;&nbsp;
		<i style="font-size:14px" class="fa">&#xf041;</i>
		<label style="font-size:14px;text-align: left;"><?php echo $row3['location']; ?></label>
	</div>
	<form method="post" class="content" style="width: 95%;margin:0px;margin-top: -1px; border: 1px solid #D3D3D3; color: #808080;border-radius: 0px 0px 4px 4px;"><p style="font-size:14px;text-align: left;"><?php echo $row3['description']; ?></p>
		<br>
	</form>
</div>
<?php }?>

<div class="content" style=" width:65%; margin: 20px; margin-left: 400px; border-radius: 4px 4px 4px 4px; border: 1px solid #D3D3D3;">
  <i style="position: absolute; font-size:24px; margin-left:10px; color: #FF6600;" class='fas'>&#xf091;</i>
       
  <h3 style="margin-left: 50px;">Awards Events and Publications</h3>
</div>
<?php
  $query8 = "SELECT * FROM events WHERE username='$username';";
  $result8 = mysqli_query($db, $query8);
 ?>
 <?php while($row4=mysqli_fetch_assoc($result8)) { ?>
<div class="content" style=" width:65%; margin-top: -22px; margin-left: 400px; border-radius: 0px 0px 4px 4px; border: 1px solid #D3D3D3; color: #808080;">
	
	<div class="header" style="margin:0px; background :#F0F0F0;border: 1px solid #D3D3D3; color: #808080; width:95%; border-radius: 4px 4px 0px 0px;text-align: left;">
		<label style="text-align: left;color: black;"><?php echo $row4['event']; ?></label>
		<i style="font-size:14px;margin-left: 400px;" class="fa">&#xf073;</i>
		<label style="font-size:14px;text-align: left;"><?php echo $row4['date']; ?></label>
		<br>
		<i style="font-size:14px" class="fa">&#xf1ad;</i>
		<label style="font-size:14px;text-align: left;"><?php echo $row4['institute']; ?></label>&nbsp;&nbsp;
	</div>
	<form method="post" class="content" style="width: 95%;margin:0px;margin-top: -1px; border: 1px solid #D3D3D3; color: #808080;border-radius: 0px 0px 4px 4px;"><p style="font-size:14px;text-align: left;"><?php echo $row4['description']; ?></p>
		<br>
	</form>	
</div>
<?php }?>
</body>
</html>