<?php 
@include 'db.php';

if(isset($_POST['submit'])){
	$fname=mysqli_real_escape_string($conn,$_POST['fname']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$lname=mysqli_real_escape_string($conn,$_POST['lname']);
	$pass=md5($_POST['pass']);
	$conpass=md5($_POST['conpass']);

	$sql1="select * from my_table where firstname='$fname'";

        $select=mysqli_query($conn,$sql1);
        $num=mysqli_num_rows($select);

        
        if($pass!=$conpass){
             echo "password not matched";
			}
		else{
             $sql="Insert into my_table (firstname,lastname,email,password) values('$fname','$lname','$email','$pass')";
			 mysqli_query($conn,$sql);
			 header('location:login.php');
				
        }
	

};
?>
<!DOCTYPE html>

<html>
<head>
  <title>Registration form</title>
  <link rel="stylesheet"  href="style.css">
</head>
<body>

<div class="form-container">
  <form method="post" action="">
     <h3>Register Here</h3>
	 <div class="input-group">
	 <label>Firstname</label>
  	  <input type="text" name="fname"   required >
	 </div>
     <div class="input-group">
      <label>Lastname</label>
  	  <input type="text" name="lname" id="lname" required >
	 </div>
	 <div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" id="email" required> 
	 </div>

	 <div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="pass" required>
	 </div>

	 <div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="conpass"  required>
	 </div>
	 
  	<div class="input-group">
  	  <input type="submit" class="form-btn" value="Register now" id="submit" name="submit" >
	</div>
  	<p>
  		Already have an account? <a href="login.php">Sign in</a>
  	</p>
  </form>
  </div>

 
</body>
</html>