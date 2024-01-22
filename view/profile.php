<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
   header("Location: login.php"); // Redirect to the login page
   exit();
}
?>

<?php include '../model/userInfoFromDB.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <title>Profile</title>
</head>

<body>
   <?php include 'Header.php'; ?>

   <form class="profile">
      <h1>Profile</h1>
      <div class="notification <?php echo isset($_SESSION['notification_class']) ? $_SESSION['notification_class'] : ''; ?>">
         <?php
         if (isset($_SESSION['notification'])) {
            echo $_SESSION['notification'];
            $_SESSION['notification'] = "";
            $_SESSION['notification_class'] = ""; // Reset the class after displaying
         }
         ?>
      </div>

      <div class="img-container">
         <div>
            <h3><a href="Edit_Profile/Edit_Profile.php">Want to edit profile?</a></h3>
            <h3><a href="change_password.php">Change password</a></h3>
         </div>
         <div>
            <img class="profile-img" src="<?php echo "../uploads/" . $_SESSION['image'] ?>" width="100px" alt="Image">
            <br><br>
            <a href="changephoto.php"> Change Photo </a>
         </div>
      </div>

      <br><br>
      <div class="information-container">
         <div class="general-info">
            <h2 class="info-tilte">General Information:</h2>
            <p><b>First Name:</b> <?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "" ?></p>
            <p><b>Last Name:</b> <?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : "" ?></p>
            <p><b>Father's Name:</b> <?php echo isset($_SESSION['fathersname']) ? $_SESSION['fathersname'] : "" ?></p>
            <p><b>Mother's Name:</b> <?php echo isset($_SESSION['mothersname']) ? $_SESSION['mothersname'] : "" ?></p>
            <p><b>Gender:</b> <?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : "" ?></p>
            <p><b>Blood Group:</b> <?php echo isset($_SESSION['bloodgroup']) ? $_SESSION['bloodgroup'] : "" ?></p>
            <p><b>Religion:</b> <?php echo isset($_SESSION['religion']) ? $_SESSION['religion'] : "" ?></p>
         </div>

         <div class="contact-info">
            <h2 class="info-tilte">Contact Information:</h2>
            <p><b>Email:</b> <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?></p>
            <p><b>Phone/Mobile:</b> <?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : "" ?></p>
            <p><b>Website:</b> <?php echo isset($_SESSION['website']) ? $_SESSION['website'] : "" ?></p>
            <p><b>Address:</b> <?php echo isset($_SESSION['address']) ? $_SESSION['address'] : "" ?></p>
         </div>
         <div class="academic-container">
            <h2 class="info-tilte">Academic Information:</h2>
            <div class="academic-info">
               <div class="academic-child">
                  <h3>SSC Information:</h3>
                  <p><b>School Name:</b> <?php echo isset($_SESSION['SSCScName']) ? $_SESSION['SSCScName'] : "" ?></p>
                  <p><b>GPA:</b> <?php echo isset($_SESSION['SSCGPA']) ? $_SESSION['SSCGPA'] : "" ?></p>
                  <p><b>Passing Year:</b> <?php echo isset($_SESSION['SSCPY']) ? $_SESSION['SSCPY'] : "" ?></p>
               </div>

               <div class="academic-child">
                  <h3>HSC Information:</h3>
                  <p><b>College Name:</b> <?php echo isset($_SESSION['HSCClgName']) ? $_SESSION['HSCClgName'] : "" ?></p>
                  <p><b>GPA:</b> <?php echo isset($_SESSION['HSCGPA']) ? $_SESSION['HSCGPA'] : "" ?></p>
                  <p><b>Passing Year:</b> <?php echo isset($_SESSION['HSCPY']) ? $_SESSION['HSCPY'] : "" ?></p>
               </div>

               <div class="academic-child">
                  <h3>BSc Information:</h3>
                  <p><b>University Name:</b> <?php echo isset($_SESSION['BScUnName']) ? $_SESSION['BScUnName'] : "" ?></p>
                  <p><b>CGPA:</b> <?php echo isset($_SESSION['BScCGPA']) ? $_SESSION['BScCGPA'] : "" ?></p>
                  <p><b>Passing Year:</b> <?php echo isset($_SESSION['BScPY']) ? $_SESSION['BScPY'] : "" ?></p>
               </div>

               <div class="academic-child">
                  <h3>MSc Information:</h3>
                  <p><b>University Name:</b> <?php echo isset($_SESSION['MScUnName']) ? $_SESSION['MScUnName'] : "" ?></p>
                  <p><b>CGPA:</b> <?php echo isset($_SESSION['MScCGPA']) ? $_SESSION['MScCGPA'] : "" ?></p>
                  <p><b>Passing Year:</b> <?php echo isset($_SESSION['MScPY']) ? $_SESSION['MScPY'] : "" ?></p>
               </div>

            </div>
         </div>

         <div class="security-questions">
            <h2 class="info-tilte">Security Questions:</h2>
            <p class="imp-note"><i>N.B. If you forgot your password then after matching at least 3 answers, we will let you recover your account.</i></p>

            <div class="security-question">
               <p><b>1. In what city or town did your mother and father meet?</b>: <?php echo !empty($_SESSION['sq1']) ? $_SESSION['sq1'] : "*Not set" ?></p>
               <p><b>2. What is your favorite movie?</b>: <?php echo !empty($_SESSION['sq2']) ? $_SESSION['sq2'] : "*Not set" ?></p>
               <p><b>3. What was your favorite sport in high school?</b>: <?php echo !empty($_SESSION['sq3']) ? $_SESSION['sq3'] : "*Not set" ?></p>
               <p><b>4. Who was your childhood hero?</b>: <?php echo !empty($_SESSION['sq4']) ? $_SESSION['sq4'] : "*Not set" ?></p>
               <p><b>5. When you were young, what did you want to be when you grew up?</b>: <?php echo !empty($_SESSION['sq5']) ? $_SESSION['sq5'] : "*Not set" ?></p>
               <p><b>6. In what city were you born?</b>: <?php echo !empty($_SESSION['sq6']) ? $_SESSION['sq6'] : "*Not set" ?></p>
            </div>
         </div>

         <div class="account-info" id="acc-info">
            <h2 class="info-tilte">Account Information:</h2>
            <p><b>UserID:</b> <?php echo isset($_SESSION['userID']) ? $_SESSION['userID'] : ""; ?></p>
            <p><b>Username:</b> <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ""; ?></p>
            <p><b>Password:</b> <?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ""; ?></p>
         </div>

      </div>
   </form>

   <?php include 'logout.php'; ?>
   <?php include 'fotter.php'; ?>
</body>

</html>