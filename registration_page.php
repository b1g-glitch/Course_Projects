<?php
include("config.php");

$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$email = $_POST['email'];
$guardian_name = $_POST['guardian_name'];
$state_of_origin = $_POST['state_of_origin'];
$age = $_POST['age'];
$residence_address = $_POST['residence_address'];
$residence_state = $_POST['residence_state'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$school_name = $_POST['school_name'];
$class = $_POST['class'];

$database_name = "exercise_db";

$db_found = mysqli_select_db($conn, $database_name);

if (isset($_POST['submit_button'])){

	if($db_found) {
		$pwh = password_hash($password, PASSWORD_DEFAULT);
		$sql_statement = "INSERT INTO users(username, password, first_name, last_name, address, email, guardian_name, state_of_origin, age, residence_address, residence_state, city, zip_code, school_name, class) VALUES('$username','$pwh','$first_name','$last_name','$address','$email','$guardian_name', '$state_of_origin', '$age', '$residence_address', '$residence_state', '$city', '$zip_code', '$school_name', '$class')";
		$query = mysqli_query($conn, $sql_statement);
		mysqli_close($conn);

		echo("Records inserted into database successfully");


	}else{
		echo("Database not found");
	}

	header("Location: login.php");
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
			<div id="error_display"></div>
			<form class="mt-5 bg-white p-4" name="userLogin" method="POST" onsubmit="return validateUser()">
				<center><header class="mt-5" style="font-size: 30px; font-weight: bold;">Student Registration</header></center>
				<div class="mx-auto col-12" id="alert_display"></div>
				<div class="col-6 mx-auto">
				  <label for="inputUsername" class="form-label">Username</label>
				  <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username">
				</div>
				<div class="col-6 mx-auto">
				  <label for="inputPassword" class="form-label mt-3">Password</label>
				  <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputFirstName" class="form-label mt-0">First Name</label>
					<input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="first_name">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputLastName" class="form-label mt-0">Last Name</label>
					<input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="last_name">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputAddress" class="form-label mt-0">Address</label>
					<input type="address" class="form-control" id="inputAddress" placeholder="Address" name="address">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputEmail" class="form-label mt-0">Email</label>
					<input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputGuardianName" class="form-label mt-0">Guardian Name</label>
					<input type="text" class="form-control" id="inputGuardianName" placeholder="Guardian Name" name="guardian_name">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputStateOfOrigin" class="form-label mt-0">State Of Origin</label>
					<input type="Text" class="form-control" id="inputStateOfOrigin" placeholder="State Of Origin" name="state_of_origin">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputAge" class="form-label mt-0">Age</label>
					<input type="text" class="form-control" id="inputAge" placeholder="Age" name="age">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputResidenceAddress" class="form-label mt-0">Residence_Address</label>
					<input type="text" class="form-control" id="inputResidenceAddress" placeholder="Residence Address" name="residence_address">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputResidenceState" class="form-label mt-0">Residence State</label>
					<input type="text" class="form-control" id="inputResidenceState" placeholder="Residence State" name="residence_state">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputCity" class="form-label mt-0">City</label>
					<input type="text" class="form-control" id="inputCity" placeholder="City" name="city">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputZipCode" class="form-label mt-0">Zip Code</label>
					<input type="text" class="form-control" id="inputZipCode" placeholder="Zip Code" name="zip_code">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputSchoolName" class="form-label mt-0">School Name</label>
					<input type="text" class="form-control" id="inputSchoolName" placeholder="School Name" name="school_name">
				</div>
				<div class="col-6 mx-auto">
					<label for="inputClass" class="form-label mt-0">Class</label>
					<input type="text" class="form-control" id="inputClass" placeholder="Class" name="class">
				</div>
				<div class="col-6 mx-auto">
					<button type="submit" name="submit_button" class="btn btn-primary mt-3">Sign Up</button>
				</div>
				<br>
			</form>
			</div>
		
			  
</body>
<script>

	function validateUser(){
		var username= document.forms["userLogin"]["username"].value;
		var password= document.forms["userLogin"]["password"].value;
		var first_name= document.forms["userLogin"]["first_name"].value;
		var last_name= document.forms["userLogin"]["last_name"].value;
		var address= document.forms["userLogin"]["address"].value;
		var email= document.forms["userLogin"]["email"].value;
		var guardian_name= document.forms["userLogin"]["guardian_name"].value;
		var state_of_origin= document.forms["userLogin"]["state_of_origin"].value;
		var age= document.forms["userLogin"]["age"].value;
		var residence_address= document.forms["userLogin"]["residence_address"].value;
		var residence_state= document.forms["userLogin"]["residence_state"].value;
		var city= document.forms["userLogin"]["city"].value;
		var zip_code= document.forms["userLogin"]["zip_code"].value;
		var school_name= document.forms["userLogin"]["school_name"].value;
		var class= document.forms["userLogin"]["class"].value;

		if (username=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a valid username";
			return false;	
		}

		if (password=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a valid password";
			return false;
		}

		if (first_name=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a first name";
			return false;
		}

		if (last_name=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a last name";
			return false;
		}

		if (address=="") {
			document.getElementById("error_display").innerHTML= "Please Enter an address";
			return false;
		}

		if (email=="") {
			document.getElementById("error_display").innerHTML= "Please Enter an email";
			return false;
		}

		if (guardian_name=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a guardian_name";
			return false;
		}

		if (state_of_origin=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a state_of_origin";
			return false;
		}

		if (age=="") {
			document.getElementById("error_display").innerHTML= "Please Enter an age";
			return false;
		}

		if (residence_address=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a residence_address";
			return false;
		}

		if (residence_state=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a residence_state";
			return false;
		}

		if (city=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a city";
			return false;
		}

		if (zip_code=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a zip_code";
			return false;
		}

		if (school_name=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a school_name";
			return false;
		}

		if (class=="") {
			document.getElementById("error_display").innerHTML= "Please Enter a class";
			return false;
		}
		}

</script>
</html>