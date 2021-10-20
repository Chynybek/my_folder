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
							<input type="text" name="phone" class="form-control" required>
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
