<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
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
    $username= $_SESSION['username'];
   // $query0 = "SELECT * FROM users WHERE username='$username';";
  	//$result0 = mysqli_query($db, $query0);
  	//$userres0= mysqli_fetch_assoc($result0);
	 //$uid=$userres0['id']
    ?>
  <div style="width: 100%; color: blue; height: 60px;  margin: 0px auto 0px;  margin-left: 0px; background: #404040;  font-size: 150%; border-radius: 0px 0px 0px 0px;" class="header">
  	<a href='display.php?ID=<?php echo $username ?>' target="_blank"><button style="background: #FF6600; font-size: 50%; color:white; border: none; margin-top: 14px; margin-left: 800px; padding: 10px;">Share</button></a>
    <button style="background: #FF6600; font-size: 50%; color:white; border: none; margin-left: 20px;padding: 10px;">Download Resume</button>
  <a style="text-decoration: none;" href="index.php?logout='1'" ><label style=" font-size: 60%; margin-left: 10px;color: #C0C0C0;"> <b>LOGOUT</b></label></a>
</div>

<div class="content" style="position: absolute;max-width:25%; margin: 20px; border-radius: 4px 4px 0px 0px; border: 1px solid #D3D3D3; text-align: center;">

<!--
<button style="background: white; color: black; border: none; font-size:15px; margin-left: 300px"><i class='fas fa-pen'></i></button> -->

<div class="open-btn" >
      <button class="open-button" onclick="openForm1()" style="background: white; color: black; border: none; font-size:15px; margin-left: 300px"><i class='fas fa-pen'></i></button>
    </div>
    <div class="login-popup" >
      <div class="form-popup" id="popupForm1" style="display: none; text-align: left;position: absolute;">
        <form action="index.php" method="post" class="form-container" style=" border: 1px solid #D3D3D3;; border-radius: 4px 4px 4px 4px; box-shadow: 0 0 0 9999px rgba(0,0,0,0.5);">
          <h3 style="color: #505050;">Edit Profile Details</h3>
          <hr><br>
          <label for="e_mail">*E-mail:</label>
          <br>
          <input type="text" id="e_mail" name="e_mail" required>
          <br><br>
          <label for="fullname">*Fullname:</label>
          <br>
          <input type="text" id="fullname" name="fullname" required>
          <br><br>
          <label for="location">*Location:</label>
          <br>
          <input type="text" id="location" name="location" required>
          <br><br>
          <label for="phone">*Phone Number:</label>
          <br>
          <input type="text" id="phone" name="phone" required>
          <br><br>
          <button style="background: #FF6600; border: none; padding: 5px; color: white;" type="submit" name="profile_data" class="form-btn">Save Changes</button>
          <button style="background: grey; border: none; padding: 5px; color: white;" type="button" class="form-cancel" onclick="closeForm1()">Close</button>
        </form>
      </div>
    </div>

    <?php
    if (isset($_POST['profile_data'])) {
	$email= mysqli_real_escape_string($db, $_POST['e_mail']);
	$fullname = mysqli_real_escape_string($db, $_POST['fullname']);
	$location = mysqli_real_escape_string($db, $_POST['location']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	$delquery="DELETE FROM `profile_details` WHERE `username`='$username';";
	
	mysqli_query($db, $delquery);
	
	$query = "INSERT INTO profile_details (username, email, fullname, location, phone) 
  			  VALUES('$username', '$email', '$fullname', '$location', '$phone');";
  	mysqli_query($db, $query);
  	}
  	?>

    <script>
      function openForm1() {
        document.getElementById("popupForm1").style.display="block";
      }
      
      function closeForm1() {
        document.getElementById("popupForm1").style.display="none";
	}
    </script>

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


<div style="position: absolute; width: 335px; margin: 20px;margin-top: 209px; border-radius: 0px 0px 4px 4px; border: 1px solid #D3D3D3;border: 1px solid #D3D3D3; background:white; color: #808080;">
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
  
 <!-- <button style="background: white; color: black; border: none; font-size:15px; margin-left: 800px"><i class='fas fa-pen'></i></button> -->
 <div class="open-btn" >
      <button class="open-button" onclick="openForm2()" style="background: white; color: black; border: none; font-size:15px; margin-left: 800px"><i class='fas fa-pen'></i></button>
    </div>
    <div class="login-popup" >
      <div class="form-popup" id="popupForm2" style="display: none; text-align: left;position: fixed;">
        <form action="index.php" method="post" class="form-container" style="width:100%; margin: auto; border: 1px solid #D3D3D3;; border-radius: 4px 4px 4px 4px; box-shadow: 0 0 0 9999px rgba(0,0,0,0.5);">
          <h3 style="color: #505050;">Add Profile Overview</h3>
          <hr><br>
          <label for="overview" >*Some Words About You (Max 500 Characters)</label>
          <br>
          <!--<input type="text" style="width: 100%;" id="overview" name="overview" required>-->
          <textarea rows = "5" cols = "60" maxlength = "500" name = "overview" id="overview" style="width: 100%;">
         </textarea><br>
          <hr><br>
          <button style="background: #FF6600; border: none; padding: 5px; color: white;" type="submit" name="overview_data" class="form-btn">Save Changes</button>
          <button style="background: grey; border: none; padding: 5px; color: white;" type="button" class="form-cancel" onclick="closeForm2()">Close</button>
        </form>
      </div>
    </div>

    <?php
    if (isset($_POST['overview_data'])) {
	$overview= mysqli_real_escape_string($db, $_POST['overview']);
	$delquery2="DELETE FROM `profile_overview` WHERE `username`='$username';";
	
	mysqli_query($db, $delquery2);
	
	$query2 = "INSERT INTO profile_overview (username, overview) 
  			  VALUES('$username', '$overview');";
  	mysqli_query($db, $query2);
  	}
  	?>

  <script>
      function openForm2() {
        document.getElementById("popupForm2").style.display="block";
      }
      
      function closeForm2() {
        document.getElementById("popupForm2").style.display="none";
      }
    </script>

 <h3 style="margin: 10px;">Profile Overview</h3>
</div>
<div class="content" style=" width:65%; margin-top: -22px; margin-left: 400px; border-radius: 0px 0px 4px 4px; border: 1px solid #D3D3D3; color: #808080;">
<?php
  $query2 = "SELECT * FROM profile_overview WHERE username='$username';";
  $result2 = mysqli_query($db, $query2);
  $userres2= mysqli_fetch_assoc($result2);
  echo $userres2['overview'];
  ?>	
</div>


<div class="content" style="position: absolute; width:25%; margin: 20px; margin-top: 250px; border-radius: 4px 4px 0px 0px; border: 1px solid #D3D3D3;">

  <!--<button style="background: white; color: black; border: none; font-size:15px; margin-left: 300px"><i class='fas fa-pen'></i></button>-->
  <div class="open-btn" >
  <button class="open-button" onclick="openForm3()" style="background: white; color: black; border: none; font-size:15px; margin-left: 300px"><i class='fas fa-pen'></i></button>
  </div>
  <div class="login-popup" >
      <div class="form-popup" id="popupForm3" style="display: none; text-align: left;position: fixed;">
        <form action="index.php" method="post" class="form-container" style="width:100%; margin: auto;border: 1px solid #D3D3D3;; border-radius: 4px 4px 4px 4px; box-shadow: 0 0 0 9999px rgba(0,0,0,0.5);">
          <h3 style="color: #505050;">Add Highlights</h3>
          <hr><br>
          <label for="highlights" style="font-size: 75%;">*Please add the top highlights of your profile. For eg. React Ninja, Amazon, Software Architect, etc.(Add highlights seperated by comma)</label>
          <br>
          <!--<input type="text" style="width: 100%;" id="overview" name="overview" required>-->
          <input style="width: 100%;" maxlength = "500" type="text" id="highlights" name="highlights" required><br><br>
          <hr><br>
          <button style="background: #FF6600; border: none; padding: 5px; color: white;" type="submit" name="highlights_data" class="form-btn">Save Changes</button>
          <button style="background: grey; border: none; padding: 5px; color: white;" type="button" class="form-cancel" onclick="closeForm3()">Close</button>
        </form>
      </div>
    </div>

    <?php
    if (isset($_POST['highlights_data'])) {
	$highlights= mysqli_real_escape_string($db, $_POST['highlights']);
	$delquery3="DELETE FROM `highlights` WHERE `username`='$username';";
	
	mysqli_query($db, $delquery3);
	
	$query3 = "INSERT INTO highlights (username, skills) 
  			  VALUES('$username', '$highlights');";
  	mysqli_query($db, $query3);
  	}
  	?>
  	
  <script>
      function openForm3() {
        document.getElementById("popupForm3").style.display="block";
      }
      
      function closeForm3() {
        document.getElementById("popupForm3").style.display="none";
      }
    </script>

  <h3>Highlights</h3>
</div>
<div class="content" style="position: absolute; width:25%; margin: 20px; margin-top: 313px; border-radius: 0px 0px 4px 4px; border: 1px solid #D3D3D3;">
	<?php
  $query3 = "SELECT * FROM highlights WHERE username='$username';";
  $result3 = mysqli_query($db, $query3);
  $userres3= mysqli_fetch_assoc($result3);
  echo $userres3['skills'];
  ?>
  	</div>


<div class="content" style=" width:65%; margin: 20px; margin-left: 400px; border-radius: 4px 4px 4px 4px; border: 1px solid #D3D3D3;">
  <i style="position: absolute; font-size:24px; margin-left:10px; color: #FF6600;" class='fas'>&#xf0b1;</i>
  
  <!--<button style="background: white; color: black; border: none; font-size:15px; margin-left: 630px"><b>+Add more eperience</b></i></button>-->
  <div class="open-btn" >
      <button class="open-button" onclick="openForm4()" style="background: white; color: black; border: none; font-size:15px; margin-left: 630px"><b>+Add more eperience</b></button>
    </div >
    <div class="login-popup" >
      <div class="form-popup" id="popupForm4" style="display: none; text-align: left;position: fixed;">
        <form action="index.php" method="post" class="form-container" style="width:100%; margin: auto; border: 1px solid #D3D3D3;; border-radius: 4px 4px 4px 4px; box-shadow: 0 0 0 9999px rgba(0,0,0,0.5);">
         <h3 style="color: #505050;">Add more eperience</h3>
          <hr><br>
          <label for="title">*Title:</label>
          <br>
          <input type="text" id="title" name="title" required>
        	<br><br>
          <label for="company">*Company:</label>
          <br>
          <input type="text" id="company" name="company" required>
          <br><br>
          <label for="startdate">*Start Date:</label>
          <br>
          <input type="text" id="startdate" name="startdate" required>
          <br><br>
          <label for="enddate">*End Date:</label>
          <br>
          <input type="text" id="enddate" name="enddate" required>
          <br><br>
          <label for="joblocation">*Location:</label>
          <br>
          <input type="text" id="joblocation" name="joblocation" required>
          <br><br>
          <label for="jobdesc">*Description:</label>
          <br>
          <input type="text" id="jobdesc" name="jobdesc" required>
          <br><br>
          <hr><br>
          <button style="background: #FF6600; border: none; padding: 5px; color: white;" type="submit" name="exp_data" class="form-btn">Save Changes</button>
          <button style="background: grey; border: none; padding: 5px; color: white;" type="button" class="form-cancel" onclick="closeForm4()">Close</button>
        </form>
      </div>
    </div>
     <?php
    if (isset($_POST['exp_data'])) {
	$title= mysqli_real_escape_string($db, $_POST['title']);
	$company = mysqli_real_escape_string($db, $_POST['company']);
	$startdate = mysqli_real_escape_string($db, $_POST['startdate']);
	$enddate = mysqli_real_escape_string($db, $_POST['enddate']);
	$joblocation = mysqli_real_escape_string($db, $_POST['joblocation']);
	$jobdesc = mysqli_real_escape_string($db, $_POST['jobdesc']);
	$query4 = "INSERT INTO experience (username, title, company, startdate, enddate, location, description) 
  			  VALUES('$username', '$title', '$company', '$startdate', '$enddate', '$joblocation', '$jobdesc');";
  	mysqli_query($db, $query4);
  	}
  	?>
  <script>
      function openForm4() {
        document.getElementById("popupForm4").style.display="block";
      }
      
      function closeForm4() {
        document.getElementById("popupForm4").style.display="none";
      }
    </script>



 <!-- <button style="background: white; color: black; border: none; font-size:15px; margin-left: 630px"><b>+Add project</b></i></button>-->

<div class="open-btn" >
      <button class="open-button" onclick="openForm5()" style="background: white; color: black; border: none; font-size:15px; margin-left: 630px"><b>+Add project</b></button>
    </div >
    <div class="login-popup" >
      <div class="form-popup" id="popupForm5" style="display: none; text-align: left;position: fixed;">
        <form action="index.php" method="post" class="form-container" style="width:100%; margin: auto;border: 1px solid #D3D3D3;; border-radius: 4px 4px 4px 4px; box-shadow: 0 0 0 9999px rgba(0,0,0,0.5);">
         <h3 style="color: #505050;">Add project</h3>
          <hr><br>
          <label for="projectname">*Project Name:</label>
          <br>
          <input type="text" id="projectname" name="projectname" required>
        	<br><br>
          <label for="skills">*Skills:</label>
          <br>
          <input type="text" id="skills" name="skills" required>
          <br><br>
          <label for="applink">*App link:</label>
          <br>
          <input type="text" id="applink" name="applink" >
          <br><br>
          <label for="pstartdate">*Start Date:</label>
          <br>
          <input type="text" id="pstartdate" name="pstartdate" required>
          <br><br>
          <label for="penddate">*End Date:</label>
          <br>
          <input type="text" id="penddate" name="penddate" required>
          <br><br>
          <label for="projectdesc">*Description:</label>
          <br>
          <input type="text" id="projectdesc" name="projectdesc" required>
          <br><br>
          <hr><br>
          <button style="background: #FF6600; border: none; padding: 5px; color: white;" type="submit" name="project_data" class="form-btn">Save Changes</button>
          <button style="background: grey; border: none; padding: 5px; color: white;" type="button" class="form-cancel" onclick="closeForm5()">Close</button>
        </form>
      </div>
    </div>
    <?php
    if (isset($_POST['project_data'])) {
	$projectname= mysqli_real_escape_string($db, $_POST['projectname']);
	$skills = mysqli_real_escape_string($db, $_POST['skills']);
	$applink = mysqli_real_escape_string($db, $_POST['applink']);
	$pstartdate = mysqli_real_escape_string($db, $_POST['pstartdate']);
	$penddate = mysqli_real_escape_string($db, $_POST['penddate']);
	$projectdesc = mysqli_real_escape_string($db, $_POST['projectdesc']);
	$query5 = "INSERT INTO project (username, title, skills, applink, startdate, enddate, description) 
  			  VALUES('$username', '$projectname', '$skills', '$applink', '$pstartdate', '$penddate', '$projectdesc');";
  	mysqli_query($db, $query5);
  	}
  	?>
	<script>
      function openForm5() {
        document.getElementById("popupForm5").style.display="block";
      }
      
      function closeForm5() {
        document.getElementById("popupForm5").style.display="none";
      }
    </script>

  <h3 style="margin: 10px;">Experience and Projects</h3>
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
		<button type="submit" name="remove" style="border: none; background: none;"><i style="font-size:24px;color: black;margin-left: 750px;" class="fa fa-trash"></i></button>
	</form>
	<?php if (isset($_POST['remove'])) {
		$idval= $row['exid'];
		$remquery="DELETE FROM `experience` WHERE `exid`='$idval';";
		mysqli_query($db, $remquery);	
		}
		?>
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
		<button type="submit" name="remove1" style="border: none; background: none;"><i style="font-size:24px;color: black;margin-left: 750px;" class="fa fa-trash"></i></button>
	</form>
	<?php if (isset($_POST['remove1'])) {
		$idval1= $row1['projid'];
		$remquery1="DELETE FROM `project` WHERE `projid`='$idval1';";
		mysqli_query($db, $remquery1);	
		}
		?>
	
</div>
<?php }?>


<div class="content" style=" width:65%; margin: 20px; margin-left: 400px; border-radius: 4px 4px 4px 4px; border: 1px solid #D3D3D3;">
  <i style="position: absolute; font-size:24px; margin-left:10px; color: #FF6600;" class='fas'>&#xf5da;</i>

 <!-- <button style="background: white; color: black; border: none; font-size:15px; margin-left: 630px"><b>+Add more education</b></button> -->

<div class="open-btn" >
      <button class="open-button" onclick="openForm6()" style="background: white; color: black; border: none; font-size:15px; margin-left: 630px"><b>+Add more education</b></button>
    </div >
    <div class="login-popup" >
      <div class="form-popup" id="popupForm6" style="display: none; text-align: left;position: fixed;">
        <form action="index.php" method="post" class="form-container" style="width:100%; margin: auto;border: 1px solid #D3D3D3;; border-radius: 4px 4px 4px 4px; box-shadow: 0 0 0 9999px rgba(0,0,0,0.5);">
         <h3 style="color: #505050;">Add Education</h3>
          <hr><br>
          <label for="degree">*Degree:</label>
          <br>
          <input type="text" id="degree" name="degree" required>
        	<br><br>
          <label for="institute">*School/Institute Name:</label>
          <br>
          <input type="text" id="institute" name="institute" required>
          <br><br>
          <label for="eduloc">*Location:</label>
          <br>
          <input type="text" id="eduloc" name="eduloc" required>
          <br><br>
          <label for="edustartdate">*Start Date:</label>
          <br>
          <input type="text" id="edustartdate" name="edustartdate" required>
          <br><br>
          <label for="eduenddate">*End Date:</label>
          <br>
          <input type="text" id="eduenddate" name="eduenddate" required>
          <br><br>
          <label for="edudesc">*Description:</label>
          <br>
          <input type="text" id="edudesc" name="edudesc" required>
          <br><br>
          <hr><br>
          <button style="background: #FF6600; border: none; padding: 5px; color: white;" type="submit" name="edu_data" class="form-btn">Save Changes</button>
          <button style="background: grey; border: none; padding: 5px; color: white;" type="button" class="form-cancel" onclick="closeForm6()">Close</button>
        </form>
      </div>
    </div>
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
    <script>
      function openForm6() {
        document.getElementById("popupForm6").style.display="block";
      }
      
      function closeForm6() {
        document.getElementById("popupForm6").style.display="none";
      }
    </script>

  <h3 style="margin: 10px;">Education</h3>
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
		<button type="submit" name="remove2" style="border: none; background: none;"><i style="font-size:24px;color: black;margin-left: 750px;" class="fa fa-trash"></i></button>
	</form>
	<?php if (isset($_POST['remove2'])) {
		$idval2= $row2['eduid'];
		$remquery2="DELETE FROM `education` WHERE `eduid`='$idval2';";
		mysqli_query($db, $remquery2);	
		}
		?>
</div>
<?php }?>


<div class="content" style=" width:65%; margin: 20px; margin-left: 400px; border-radius: 4px 4px 4px 4px; border: 1px solid #D3D3D3;">
  <i style="position: absolute; font-size:24px; margin-left:10px; color: #FF6600;" class='fas'>&#xf0a3;</i>
  
  <!--<button style="background: white; color: black; border: none; font-size:15px; margin-left: 630px"><b>+Add more certifications</b></button> -->

<div class="open-btn" >
      <button class="open-button" onclick="openForm7()" style="background: white; color: black; border: none; font-size:15px; margin-left: 630px"><b>+Add more certification</b></button>
    </div >
    <div class="login-popup" >
      <div class="form-popup" id="popupForm7" style="display: none; text-align: left;position: fixed;">
        <form action="index.php" method="post" class="form-container" style="width:100%; margin: auto;border: 1px solid #D3D3D3;; border-radius: 4px 4px 4px 4px; box-shadow: 0 0 0 9999px rgba(0,0,0,0.5);">
         <h3 style="color: #505050;">Add Certification</h3>
          <hr><br>
          <label for="certdegree">*Degree:</label>
          <br>
          <input type="text" id="certdegree" name="certdegree" required>
        	<br><br>
          <label for="certinstitute">*School/Institute Name:</label>
          <br>
          <input type="text" id="certinstitute" name="certinstitute" required>
          <br><br>
          <label for="certloc">*Location:</label>
          <br>
          <input type="text" id="certloc" name="certloc" required>
          <br><br>
          <label for="certstartdate">*Start Date:</label>
          <br>
          <input type="text" id="certstartdate" name="certstartdate" required>
          <br><br>
          <label for="certenddate">*End Date:</label>
          <br>
          <input type="text" id="certenddate" name="certenddate" required>
          <br><br>
          <label for="certdesc">*Description:</label>
          <br>
          <input type="text" id="certdesc" name="certdesc" required>
          <br><br>
          <hr><br>
          <button style="background: #FF6600; border: none; padding: 5px; color: white;" type="submit" name="cert_data" class="form-btn">Save Changes</button>
          <button style="background: grey; border: none; padding: 5px; color: white;" type="button" class="form-cancel" onclick="closeForm7()">Close</button>
        </form>
      </div>
    </div>

    <?php
    if (isset($_POST['cert_data'])) {
	$certdegree= mysqli_real_escape_string($db, $_POST['certdegree']);
	$certinstitute = mysqli_real_escape_string($db, $_POST['certinstitute']);
	$certloc = mysqli_real_escape_string($db, $_POST['certloc']);
	$certstartdate = mysqli_real_escape_string($db, $_POST['certstartdate']);
	$certenddate = mysqli_real_escape_string($db, $_POST['certenddate']);
	$certdesc = mysqli_real_escape_string($db, $_POST['certdesc']);
	$query7 = "INSERT INTO certification (username, degree, institute, location, startdate, enddate, description) 
  			  VALUES('$username', '$certdegree', '$certinstitute', '$certloc', '$certstartdate', '$certenddate', '$certdesc');";
  	mysqli_query($db, $query7);
  	}
  	?>

    <script>
      function openForm7() {
        document.getElementById("popupForm7").style.display="block";
      }
      
      function closeForm7() {
        document.getElementById("popupForm7").style.display="none";
      }
    </script>

  <h3 style="margin: 10px;">Certifications</h3>
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
		<button type="submit" name="remove3" style="border: none; background: none;"><i style="font-size:24px;color: black;margin-left: 750px;" class="fa fa-trash"></i></button>
	</form>
	<?php if (isset($_POST['remove3'])) {
		$idval3= $row3['certid'];
		$remquery3="DELETE FROM `certification` WHERE `certid`='$idval3';";
		mysqli_query($db, $remquery3);	
		}
		?>
</div>
<?php }?>

<div class="content" style=" width:65%; margin: 20px; margin-left: 400px; border-radius: 4px 4px 4px 4px; border: 1px solid #D3D3D3;">
  <i style="position: absolute; font-size:24px; margin-left:10px; color: #FF6600;" class='fas'>&#xf091;</i>
  <!--<button style="background: white; color: black; border: none; font-size:15px; margin-left: 630px"><b>+Add more events</b></button>-->

<div class="open-btn" >
      <button class="open-button" onclick="openForm8()" style="background: white; color: black; border: none; font-size:15px; margin-left: 630px"><b>+Add more events</b></button>
    </div >
    <div class="login-popup" >
      <div class="form-popup" id="popupForm8" style="display: none; text-align: left;position: fixed;">
        <form action="index.php" method="post" class="form-container" style="width:100%; margin: auto;border: 1px solid #D3D3D3;; border-radius: 4px 4px 4px 4px; box-shadow: 0 0 0 9999px rgba(0,0,0,0.5);">
         <h3 style="color: #505050;">Add Event</h3>
          <hr><br>
          <label for="eventinstitute">*Institute Name:</label>
          <br>
          <input type="text" id="eventinstitute" name="eventinstitute" required>
          <br><br>
          <label for="eventname">*Event Name:</label>
          <br>
          <input type="text" id="eventname" name="eventname" required>
        	<br><br>
          <label for="eventdate">*Date of event:</label>
          <br>
          <input type="text" id="eventdate" name="eventdate" required>
          <br><br>
          <label for="eventdesc">*Description:</label>
          <br>
          <input type="text" id="eventdesc" name="eventdesc" required>
          <br><br>
          <hr><br>
          <button style="background: #FF6600; border: none; padding: 5px; color: white;" type="submit" name="event_data" class="form-btn">Save Changes</button>
          <button style="background: grey; border: none; padding: 5px; color: white;" type="button" class="form-cancel" onclick="closeForm8()">Close</button>
        </form>
      </div>
    </div>
    <?php
    if (isset($_POST['event_data'])) {
	$eventinstitute= mysqli_real_escape_string($db, $_POST['eventinstitute']);
	$eventname = mysqli_real_escape_string($db, $_POST['eventname']);
	$eventdate = mysqli_real_escape_string($db, $_POST['eventdate']);
	$eventdesc = mysqli_real_escape_string($db, $_POST['eventdesc']);
	$query8 = "INSERT INTO events (username, institute, event, date, description) 
  			  VALUES('$username', '$eventinstitute', '$eventname', '$eventdate', '$eventdesc');";
  	mysqli_query($db, $query8);
  	}
  	?>
    <script>
      function openForm8() {
        document.getElementById("popupForm8").style.display="block";
      }
      
      function closeForm8() {
        document.getElementById("popupForm8").style.display="none";
      }
    </script>

  <h3 style="margin: 10px;">Awards Events and Publications</h3>
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
		<button type="submit" name="remove4" style="border: none; background: none;"><i style="font-size:24px;color: black;margin-left: 750px;" class="fa fa-trash"></i></button>
	</form>
	<?php if (isset($_POST['remove4'])) {
		$idval4= $row4['eventid'];
		$remquery4="DELETE FROM `events` WHERE `eventid`='$idval4';";
		mysqli_query($db, $remquery4);	
		}
		?>
	
</div>
<?php }?>
</body>
</html>