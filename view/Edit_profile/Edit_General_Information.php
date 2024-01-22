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
   <script src="../js/editgeneralinfo_validation.js"></script>
   <title>Edit General Information</title>
</head>

<body>
   <?php include 'Header.php'; ?>
   <?php include 'Edit_Profile_Header.php'; ?>
   <form class="form-type-1" action="../../controller/Edit_General_Information_action.php" method="post" onsubmit="return validateGenInfoForm(this)" enctype="multipart/form-data" novalidate>
      <fieldset class="reg-container-child">
         <legend><b>General Information:</b></legend>
         <table cellspacing="20">
            <tr>
               <td><label for="firstname"><b>First Name</b> </label></td>
               <td>: <input type="text" class="txtbx-up-profile" name="firstname" value="<?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "" ?>">
                  <?php echo isset($_SESSION['fnameErr']) ? $_SESSION['fnameErr'] : "" ?>
                  <span id="firstnameErr"></span>
               </td>
            </tr>
            <tr>
               <td><label for="lastname"><b>Last Name</b> </label></td>
               <td>: <input type="text" class="txtbx-up-profile" name="lastname" value="<?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : "" ?>">
                  <?php echo isset($_SESSION['lnameErr']) ? $_SESSION['lnameErr'] : "" ?>
                  <span id="lastnameErr"></span>
               </td>
            </tr>
            <tr>
               <td><label for="fathersname"><b>Father's Name</b> </label> </td>
               <td>: <input type="text" class="txtbx-up-profile" name="fathersname" value="<?php echo isset($_SESSION["fathersname"]) ? $_SESSION["fathersname"] : "" ?>">
                  <?php echo isset($_SESSION['fathersnameErr']) ? $_SESSION['fathersnameErr'] : "" ?>
                  <span id="fathersnameErr"></span>
               </td>
            </tr>
            <tr>
               <td><label for="mothersname"><b>Mother's Name <b></label> </td>
               <td>: <input type="text" class="txtbx-up-profile" name="mothersname" value="<?php echo isset($_SESSION["mothersname"]) ? $_SESSION["mothersname"] : "" ?>">
                  <?php echo isset($_SESSION['mothersnameErr']) ? $_SESSION['mothersnameErr'] : "" ?>
                  <span id="mothersnameErr"></span>
               </td>
            </tr>
            <tr>
               <td><label for="gender"><b>Gender:</b></label></td>
               <td>:
                  <input type="radio" id="male" name="gender" value="male" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] === 'male') ? 'checked' : '' ?>>
                  <label for="male">Male</label>
                  <input type="radio" id="female" name="gender" value="female" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] === 'female') ? 'checked' : '' ?>>
                  <label for="female">Female</label>
                  <input type="radio" id="other" name="gender" value="other" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] === 'other') ? 'checked' : '' ?>>
                  <label for="other">Other</label>
                  <?php echo isset($_SESSION['genderErr']) ? $_SESSION['genderErr'] : "" ?>
                  <span id="genderErr"></span>
               </td>
            </tr>
            <tr>
               <td><label for="bloodgroup"><b>Blood Group</b> </label></td>
               <td>
                  :
                  <select name="bloodgroup" id="bloodgroup">
                     <option value="" selected>Select Blood Group</option>
                     <option value="A+" <?php echo (isset($_SESSION['bloodgroup']) && $_SESSION['bloodgroup'] === 'A+') ? 'selected' : '' ?>>A+</option>
                     <option value="A-" <?php echo (isset($_SESSION['bloodgroup']) && $_SESSION['bloodgroup'] === 'A-') ? 'selected' : '' ?>>A-</option>
                     <option value="B+" <?php echo (isset($_SESSION['bloodgroup']) && $_SESSION['bloodgroup'] === 'B+') ? 'selected' : '' ?>>B+</option>
                     <option value="B-" <?php echo (isset($_SESSION['bloodgroup']) && $_SESSION['bloodgroup'] === 'B-') ? 'selected' : '' ?>>B-</option>
                     <option value="AB+" <?php echo (isset($_SESSION['bloodgroup']) && $_SESSION['bloodgroup'] === 'AB+') ? 'selected' : '' ?>>AB+</option>
                     <option value="AB-" <?php echo (isset($_SESSION['bloodgroup']) && $_SESSION['bloodgroup'] === 'AB-') ? 'selected' : '' ?>>AB-</option>
                     <option value="O+" <?php echo (isset($_SESSION['bloodgroup']) && $_SESSION['bloodgroup'] === 'O+') ? 'selected' : '' ?>>O+</option>
                     <option value="O-" <?php echo (isset($_SESSION['bloodgroup']) && $_SESSION['bloodgroup'] === 'O-') ? 'selected' : '' ?>>O-</option>
                  </select>
                  <?php echo isset($_SESSION['bloodgroupErr']) ? $_SESSION['bloodgroupErr'] : "" ?>
               <span id="bloodgroupErr"></span>
               </td>
               </td>
            </tr>
            <tr>
               <td><label for="religion"><b>Religion</b></label></td>
               <td>
                  :
                  <select name="religion" id="religion">
                     <option value="" selected>Select Religion</option>
                     <option value="Muslim" <?php echo (isset($_SESSION['religion']) && $_SESSION['religion'] === 'Muslim') ? 'selected' : '' ?>>Muslim</option>
                     <option value="Hindu" <?php echo (isset($_SESSION['religion']) && $_SESSION['religion'] === 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                     <option value="Christian" <?php echo (isset($_SESSION['religion']) && $_SESSION['religion'] === 'Christian') ? 'selected' : '' ?>>Christian</option>
                     <option value="Buddhist" <?php echo (isset($_SESSION['religion']) && $_SESSION['religion'] === 'Buddhist') ? 'selected' : '' ?>>Buddhist</option>
                  </select>
                  <?php echo isset($_SESSION['religionErr']) ? $_SESSION['religionErr'] : "" ?>
               <span id="religionErr"></span>
               </td>
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

<?php
$_SESSION['fnameErr'] = "";
$_SESSION['lnameErr'] = "";
$_SESSION['fathersnameErr'] = "";
$_SESSION['mothersnameErr'] = "";
$_SESSION['genderErr'] = "";
$_SESSION['bloodgroupErr'] = "";
$_SESSION['religionErr'] = "";
?>