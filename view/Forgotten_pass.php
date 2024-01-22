<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="styles.css">
   <script src="js/forgotten_validation.js"></script>
   <title>Forgotten Password</title>
</head>

<body>
   <h1>Password Reset</h1>
   <div class="notification">
      <?php
      echo isset($_SESSION['notification']) ? $_SESSION['notification'] : "";
      $_SESSION['notification'] = "";
      ?>
   </div>

   <form action="../controller/Forgotten_pass_action.php" method="post" onsubmit="return validateForgottenForm(this)">
      <label for="username"><b>Enter your Username</b></label>
      : <input type="text" name="username" id="Username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "" ?>">
      <?php echo isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : ""; ?>
      <span id="usernameErr"></span>
      <fieldset class="sq-container">
         <legend><b>Security Questions:</b></legend>
         <p>You have to answer <b>at least 3</b> security questions to reset your password.</p>
         <table cellspacing="20">
            </p>
            <tr>
               <td>
                  <label for="sq1"><b>1. In what city or town did your <br> mother and father meet?</b> </label>
               </td>
               <td>: <input type="text" class="txtbx-sq" name="sq1" id="sq1" value="<?php echo isset($_SESSION['sq1']) ? $_SESSION['sq1'] : "" ?>"></td>
            </tr>

            <tr>
               <td>
                  <label for="sq2"><b>2. What is your favorite movie?</b> </label>
               </td>
               <td>: <input type="text" class="txtbx-sq" name="sq2" id="sq2" value="<?php echo isset($_SESSION['sq2']) ? $_SESSION['sq2'] : "" ?>"></td>
            </tr>

            <tr>
               <td>
                  <label for="sq3"><b>3. What was your favorite sport in high school? </b> </label>
               </td>
               <td>: <input type="text" class="txtbx-sq" name="sq3" id="sq3" value="<?php echo isset($_SESSION['sq3']) ? $_SESSION['sq3'] : "" ?>"></td>
            </tr>

            <tr>
               <td>
                  <label for="sq4"><b>4. Who was your childhood hero? </b> </label>
               </td>
               <td>: <input type="text" class="txtbx-sq" name="sq4" id="sq4" value="<?php echo isset($_SESSION['sq4']) ? $_SESSION['sq4'] : "" ?>"></td>
            </tr>

            <tr>
               <td>
                  <label for="sq5"><b>5. When you were young, what did you <br> want to be when you grew up?</b> </label>
               </td>
               <td>: <input type="text" class="txtbx-sq" name="sq5" id="sq5" value="<?php echo isset($_SESSION['sq5']) ? $_SESSION['sq5'] : "" ?>"></td>
            </tr>

            <tr>
               <td>
                  <label for="sq6"><b>6. In what city were you born?</b> </label>
               </td>
               <td>: <input type="text" class="txtbx-sq" name="sq6" id="sq6" value="<?php echo isset($_SESSION['sq6']) ? $_SESSION['sq6'] : "" ?>"></td>
            </tr>
            <tr>
               <td><?php echo isset($_SESSION['sqErr']) ? $_SESSION['sqErr'] : ""; ?></td>
               <td><span id="sqErr"></span></td>
            </tr>
         </table>
      </fieldset>

      <input type="submit" class="button1" value="Submit">
   </form>
   <br> <br>
   <a href="login.php">Log in with password</a> <br> <br>
   <a href="registration.php">Don't have an account?</a>
</body>
<?php include 'fotter.php'; ?>

</html>

<?php
$_SESSION['sq1'] = "";
$_SESSION['sq2'] = "";
$_SESSION['sq3'] = "";
$_SESSION['sq4'] = "";
$_SESSION['sq5'] = "";
$_SESSION['sq6'] = "";
$_SESSION['sqErr'] = "";
?>