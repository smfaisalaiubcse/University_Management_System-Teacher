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
	<title>Dash Board</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<header>
		<?php include 'Header.php'; ?>
	</header>

	<h1>
		<?php
		include_once '../model/userInfoFromDB.php';
		echo "Welcome " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "!";
		?>
	</h1>
	<div class="dashboard-container">
		<?php
		include '../model/dashboardDB.php';
		include '../model/databaseconnection.php';
		$noticesHtml = getNotices($conn);

		echo $noticesHtml;

		$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
		$coursesHtml = getUserCourses($conn, $username);

		echo $coursesHtml;
		?>

	</div>

	<?php include 'logout.php'; ?>
	<footer>
		<?php include 'fotter.php'; ?>
	</footer>
</body>

</html>