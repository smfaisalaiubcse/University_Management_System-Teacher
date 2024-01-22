<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
   header("Location: login.php");
   exit();
}
?>

<?php include '../../model/userInfoFromDB.php'; ?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../styles.css">
   <script src="../js/editsecurityquestions_validation.js"></script>
   <title>Edit Contact Information</title>
</head>

<body>
   <?php include 'Header.php'; ?>
   <?php include 'Edit_Profile_Header.php'; ?>
   <form action="../../controller/Edit_Security_Information_action.php" method="post" onsubmit="return validateSqForm(this)" novalidate>
      <fieldset class="reg-container-child">
         <legend><b>Security Questions:</b></legend>
         <p><b><i> N.B. You have to set atleast 3 question answer. If you forgot your password<br>then after matching at least 3 answer we will let you to recover your account. </i></b>
         <table cellspacing="20">
            </p>
            <tr>
               <td>
                  <label for="sq1"><b>1. In what city or town did your <br> mother and father meet?</b> </label>
               </td>
               <td>: <input type="text" class="txtbx-up-profile" name="sq1" id="sq1" value="<?php echo isset($_SESSION['sq1']) ? $_SESSION['sq1'] : "" ?>"></td>
            </tr>

            <tr>
               <td>
                  <label for="sq2"><b>2. What is your favorite movie?</b> </label>
               </td>
               <td>: <input type="text" class="txtbx-up-profile" name="sq2" id="sq2" value="<?php echo isset($_SESSION['sq2']) ? $_SESSION['sq2'] : "" ?>"></td>
            </tr>

            <tr>
               <td>
                  <label for="sq3"><b>3. What was your favorite sport in high school? </b> </label>
               </td>
               <td>: <input type="text" class="txtbx-up-profile" name="sq3" id="sq3" value="<?php echo isset($_SESSION['sq3']) ? $_SESSION['sq3'] : "" ?>"></td>
            </tr>

            <tr>
               <td>
                  <label for="sq4"><b>4. Who was your childhood hero? </b> </label>
               </td>
               <td>: <input type="text" class="txtbx-up-profile" name="sq4" id="sq4" value="<?php echo isset($_SESSION['sq4']) ? $_SESSION['sq4'] : "" ?>"></td>
            </tr>

            <tr>
               <td>
                  <label for="sq5"><b>5. When you were young, what did you <br> want to be when you grew up?</b> </label>
               </td>
               <td>: <input type="text" class="txtbx-up-profile" name="sq5" id="sq5" value="<?php echo isset($_SESSION['sq5']) ? $_SESSION['sq5'] : "" ?>"></td>
            </tr>

            <tr>
               <td>
                  <label for="sq6"><b>6. In what city were you born?</b> </label>
               </td>
               <td>: <input type="text" class="txtbx-up-profile" name="sq6" id="sq6" value="<?php echo isset($_SESSION['sq6']) ? $_SESSION['sq6'] : "" ?>"></td>
            </tr>
            <tr>
               <td><?php echo isset($_SESSION['sqErr']) ? $_SESSION['sqErr'] : ""; ?></td>
               <td><span id="sqErr"></span></td>
            </tr>
         </table>

      </fieldset>
      <br>
      <input type="submit" class="button1" name="update" value="Update">
   </form>
   <br>
   <?php include 'logout.php'; ?>
</body>
<?php include '../fotter.php'; ?>

</html>