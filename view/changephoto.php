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
    <script src="js/changephoto_validation.js"></script>
    <title>Change Photo</title>
</head>

<body>
    <div class="changephoto_container">
        <h3> Update photo </h3>

        <form action="../controller/changephoto_action.php" method="post" onsubmit="return validateChangePhotoForm(this)" enctype="multipart/form-data" novalidate>
            <b>Upload Your Photo: </b><input type="file" name="photo">
            <?php echo isset($_SESSION['uploadimgerr']) ? $_SESSION['uploadimgerr'] : ""; ?>
            <span id="photoErr"></span>
            <input type="submit" class="update_button" name="submit">
        </form>
        <br>
        <a href="profile.php">Go Back </a>
        <br> <br>
    </div>
    <?php include 'logout.php'; ?>
    <div class="changephoto_footer_fix">
        <?php include 'fotter.php'; ?>
    </div>

</body>

</html>

<?php $_SESSION['uploadimgerr'] = "" ?>