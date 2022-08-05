<?php 
@include 'db.php';

session_start();
if(isset($_POST['submit'])){

	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$pass=md5($_POST['pass']);

    
	$sql="select * from my_table where email='$email' and password='$pass'";
	$result = mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
	if ($num == 1) {
			$_SESSION['email'] = $row['email'];
			header('location: home.php');
			exit();		
	}
   
};

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
  <form method="post" action="">
  <h3>Login</h3>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="pass" >
  	</div>
      <div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" >
  	</div>
  	<div class="input-group">
  		<input type="submit" class="form-btn" value="login" name="submit">
  	</div>
  	<p>
  		New member? <a href="registration.php">Sign up</a>
  	</p>
  </form>
  </div> 
</body>
</html>