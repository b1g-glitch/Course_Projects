<?php

include("config.php");

$database_name = "exercise_db";

$db_found = mysqli_select_db($conn, $database_name);

if (isset($_POST['login_button'])) {
	
	if ($db_found) {
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);

		if ($username != "" && $password != "") {
			
			$sql_statement = "SELECT count(*) as cntUser FROM users WHERE username='".$username."' and password='".$password."'";

			$result = mysqli_query($conn,$sql_statement);
			
			$row = mysqli_fetch_array($result);
			
			 $count = $row['cntUser'];

			 if($count > 0){
	            $_SESSION['username'] = $username;
	            header('Location: homepage.php');
	        }else{
	            echo "Invalid username and password";
	        }
		}
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Details</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body style="background-color: green;">
    <div class="container">

		<main>
			<form class="mt-5 bg-white p-4" name="userLogin" method="post" action="homepage.php" onsubmit="return validateUser()">
			<div id="error_display"></div>	
			<center><header class="mt-5" style="font-size: 30px; font-weight: bold;">User Login</header></center>
				<div class="mx-auto col-12" id="alert_display"></div>
				<div class="col-6 mx-auto">
				  <label for="inputUsername" class="form-label">Username</label>
				  	<input type="text" class="form-control" id="inputFirstName" placeholder="Username" name="username">
				</div>
				<div class="col-6 mx-auto">
				  <label for="inputPassword" class="form-label mt-3">Password</label>
				 	 <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
				</div>
				<div class="col-6 mx-auto">
					<button type="submit" class="btn btn-primary mt-3" name="login_button">Login</button>
				</div>
				<br>
			</form>
			</div>
		
			  
</body>
<script>

	function validateUser(){
		var username= document.forms["userLogin"]["username"].value;
		var password= document.forms["userLogin"]["password"].value;

		if (username=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a valid username";
			return false;
			
		}
		if (password=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a valid password";
			return false;
		}
	}

</script>
</html>
