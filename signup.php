<?php
session_start();
session_destroy();
$msg = "";
$a="";
$flg=0;
include 'dbconnect.php';

if (isset($_POST['register'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$user = $_POST['uname'];
	$pass = $_POST['pwd'];
	$email = $_POST['email'];
	
		$SQL = "SELECT * FROM user";
		$result = mysqli_query($db_handle, $SQL);
		while ($db_field = mysqli_fetch_assoc($result)) {
			$a = $db_field['uname'];
			if($a == $user){
				$msg = "Username is not available";
				$flg=1;
				break;
			}
		}
		
		
		if($flg==0){
				$SQL = "INSERT INTO user (`fname`, `lname`, `uname`, `pwd`, `email`) VALUES ('$fname', '$lname', '$user', '$pass', '$email')";
				mysqli_query($db_handle,$SQL);
				header("Location: suc_signup.html");
				
		}
		
	}

?>

