<?php

require_once "config_reg.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

	$fullname =trim($_POST['name']);
	$number =trim($_POST['number']);
	$date =trim($_POST['birth']);
	$gender =trim($_POST['gender']);
	$password =trim($_POST['password']);
	$confirm_password =trim($_POST['confirm_password']);
	$password_hash = password_hash($password, PASSWORD_BCRYPT);

	if($query = $db->prepare("SELECT * FROM clients WHERE number = ?")) {
		$error='';
		// Bind parameters (s = string, i =int, b=blob, etc) in our case the username is a string so we use "s"
	$query->bind_param('s',$number);
	$query->execute();
	// store the result so we can check if the account exists in the database
	$query->store_result();
		if ($query->num_rows > 0 ){
			$error .='<p class ="error">the number is already registered!</p>';
		} else {
			//Validate password
			if(strlen($password) <5) {
				$error .='<p class ="error">password must have at least 5 characters.</p>';
			}

			//Validate confirm password
			if(empty($confirm_password)){
				$error .='<p class ="error">please confirm your password.</p>';
			} else{
				if (empty($error) && ($password != $confirm_password)) {
					$error .='<p class = "error>passwords did not match.</p>';
				}
			}
			if(empty($error) ) {
				$insertQuery = $db->prepare("INSERT INTO clients (name, number, password) VALUES (ClientName, MobileNumber, Password);");
				$insertQuery->bind_param("sis",$fullname,$number,$password_hash);
				$result =$insertQuery->execute();
				if($result) {
					$error .= '<p class="success">your registration was successful!</p>';
				} else {
					$error .= '<p class="error">something went wrong!</p>';
				}
			}
		}
	}
	$query->close();
	$insertQuery->close();
	// close DB connection
	mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-9"> <!-- tells the browser to use the utf-8 character encoding when translating machine code into human-readable text and vice versa to be displayed in the browser. -->
		<title>register</title>
		<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container"> <!--provide a means to center and horizontally pad your site’s contents. -->
			<div class="row">
				<div class="col-md-12">
					<h2>register</h2>
					<p>to create an account fill this form.</p>
					<form action="" method="post">
						<div class="form-group">
							<label>name</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label>phone number</label>
							<input type="text" name="number" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label>date of birth</label>
							<input type="date" name="birth" class="form-control" required>
						</div>
						
						<div class="form-group">
							<input type="radio" id="MALE" name="gender" value="male" required>
							<label for="MALE">male</label><br>
							<input type="radio" id="FEMALE" name="gender" value="female" required>
							<label for="FEMALE">female</label><br>
						</div>
						<!--I'm making such a choice because the targeted  traditionally agrees on 2 genders in the society -->
						<div class="form-group">
							<label>password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label>confirm password</label>
							<input type="password" name="confirm_password" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-primary" value="submit">
						</div>
						<p>Already have an account? <a href="login.php">login here</a>.</p>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
