<?php

// require_once "config_reg.php";
// require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

	$fullname =trim($_POST['name']);
	$date =trim($_POST['birth']);
	$gender =trim($_POST['gender']);
	$number =trim($_POST['number']);
	$password =trim($_POST['password']);
	$confirm_password =trim($_POST['confirm_password']);
	$password_hash = password_hash($password, PASSWORD_BCRYPT);

	//Database connection
	$conn = new mysqli('localhost', 'root', '', 'clients');
	
	
		if(empty($error) ) {
				$stmt =$conn->prepare("insert into clients(ClientName, ClientDate, Gender, MobileNumber, Password) values(?, ?, ?, ?, ?)");
				$stmt->bind_param("sssss", $fullname, $date, $gender, $number, $password_hash);
				$result= $stmt->execute();
				if ($result){
				echo $result;
				echo "registration is successful";
				} else{
					echo "$conn->connect_error";
					die("connection failed: ". $conn->connect_error);
				}
			$stmt->close();
			$conn->close();
		}
			}

?>
