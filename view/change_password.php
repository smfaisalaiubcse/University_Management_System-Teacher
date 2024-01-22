<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
	header("Location: login.php");
	exit();
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles.css">
	<script src="js/changepass_validation.js"></script>
	<title>Change Password</title>
</head>

<body>
	<?php include 'Header.php'; ?>
	<form class="change-password-form" action="../controller/change_password_action.php" method="post" onsubmit="return validateChangePassForm(this)" novalidate>
		<fieldset>
			<legend><b>Change Passowrd:</b></legend>
			<table cellspacing="20">
				<tr>
					<td><label for="currentPassword"><b>Current Password: </b></label></td>
					<td>
						<input type="password" class="text-input-1" name="currentPassword" autocomplete="Off">
						<?php echo isset($_SESSION['currentPasswordErr']) ? $_SESSION['currentPasswordErr'] : ""; ?>
						<span id="currentPasswordErr"></span>
					</td>
				</tr>
				<tr>
					<td><label for="newpassword"><b>New Password:</b></label></td>
					<td>
						<input type="password" class="text-input-1" name="newpassword">
						<?php echo isset($_SESSION['newpasswordErr']) ? $_SESSION['newpasswordErr'] : ""; ?>
						<span id="newpasswordErr"></span>
					</td>
				</tr>
				<tr>
					<td><label for="confirm_new_password"><b>Confirm New Password:</b></label></td>
					<td>
						<input type="password" class="text-input-1" name="confirm_new_password" id="confirm_new_password">
						<?php echo isset($_SESSION['confirm_passwordErr']) ? $_SESSION['confirm_passwordErr'] : ""; ?>
						<span id="confirm_new_passwordErr"></span>
					</td>
				</tr>
			</table>
			<?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : ""; ?>
			<br>
			<input type="submit" class="button1" name="Change_Password" value="Change Password">
		</fieldset>
	</form>
	<?php
	include 'logout.php';
	include 'fotter.php';
	?>

</body>

</html>

<?php
$_SESSION['currentPasswordErr'] = "";
$_SESSION['newpasswordErr'] = "";
$_SESSION['confirm_passwordErr'] = "";
$_SESSION['passwordErr'] = "";
?>