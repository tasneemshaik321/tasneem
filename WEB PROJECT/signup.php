<!DOCTYPE html>
<html>
<head>
	<title>signup page</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
	<!DOCTYPE html>
<html>
<head>
	<title>signup page</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

		<div class="signup">
			<form action="webdatabase.php" method="POST">
				<label for="chk" aria-hidden="true">Sign up</label>
				<input type="text" name="txt" placeholder="User name" required>
				<input type="email" name="email" placeholder="Email" required>
				<input type="password" name="pswd" placeholder="Password" required>
				<button type="submit">Sign up</button>
			</form>
		</div>

		<div class="login">
			<form action="login.php" method="POST">
				<label for="chk" aria-hidden="true">Login</label>
				<input type="email" name="email" placeholder="Email" required>
				<input type="password" name="pswd" placeholder="Password" required>
				<button type="submit">Login</button>
			</form>
		</div>
	</div>
</body>
</html>

		