<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
	<script src="js/login_validation.js"></script>
</head>

<body>
	<div class="login-title">
	</div>
	<div class="login-container">
		<h1 align = "middle">University Management System</h1>
		<h2 align = "middle" > Login in with your organizational id number </h2>
		<form action="../controller/login_action.php" method="post" onsubmit="return validateLoginForm(this)" novalidate>
			<input type="text" placeholder="username" class="txtbx-login" name="username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "" ?>">
			<span id="usernameErr"></span>
			<?php echo isset($_SESSION['unameErr']) ? $_SESSION['unameErr'] : "" ?>
			<br> <br>
			<input type="password" placeholder="password" class="txtbx-login" name="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : "" ?>">
			<span id="passwordErr"></span>
			<?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
			<br>
			<?php echo isset($_SESSION['credentialErr']) ? $_SESSION['credentialErr'] : "" ?>
			<!-- <a href="registration.php">Don't have an account?</a> -->
			<a href="Forgotten_pass.php">Forgotten password?</a>
			<br><br>
			<div class="login-button-container">
				<button type="submit" class="button button1" name="login">Log in</button>
			</div>
		</form>
	</div>
	<?php include 'fotter.php'; ?>
</body>

</html>

<?php
$_SESSION['unameErr'] = "";
$_SESSION['passwordErr'] = "";
$_SESSION['username'] = "";
$_SESSION['password'] = "";
?>