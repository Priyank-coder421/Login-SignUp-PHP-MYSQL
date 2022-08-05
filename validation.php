<?php 
@include 'db.php';
session_start();
if(isset($_POST['submit'])){
	$fname=mysqli_real_escape_string($conn,$_POST['fname']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$lname=mysqli_real_escape_string($conn,$_POST['lname']);
	$pass=md5($_POST['pass']);
	$conpass=md5($_POST['conpass']);
    
	$sql="select * from 'my_table' where email='$email' and password='$pass'";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) === 1) {
			$_SESSION['firstname'] = $row['fname'];
			$_SESSION['lastname'] = $row['lname'];
			header('Location: home.php');
			exit();		
	}
    else{
        header('Location: login.php');  
    }
};

?>