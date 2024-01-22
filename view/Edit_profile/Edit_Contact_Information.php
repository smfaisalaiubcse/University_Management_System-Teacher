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
   <script src="../js/editcontactinfo_validation.js"></script>
   <title>Edit Contact Information</title>
</head>

<body>
   <?php include 'Header.php'; ?>
   <?php include 'Edit_Profile_Header.php'; ?>
   <form class="form-type-1" action="../../controller/Edit_Contact_Information_action.php" method="post" onsubmit="return validateConInfoForm(this)" novalidate>
      <fieldset class="reg-container-child">
         <legend><b>Contact Information:</b></legend>
         <table cellspacing="20">
            <tr>
               <td><label for="email"><b>Email:</b></label></td>
               <td>: <input type="text" class="txtbx-up-profile" name="email" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
                  <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : "" ?>
                  <span id="emailErr"></span>
               </td>
            </tr>
            <tr>
               <td><label for="Phone"><b>Phone/Mobile:</b></label></td>
               <td>: <input type="text" class="txtbx-up-profile" name="phone" id="phone" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : "" ?>">
                  <?php echo isset($_SESSION['phoneErr']) ? $_SESSION['phoneErr'] : "" ?>
                  <span id="phoneErr"></span>
               </td>
            </tr>
            <tr>
               <td><label for="website"><b>Website:</b></label></td>
               <td>: <input type="text" class="txtbx-up-profile" name="website" id="Website" value="<?php echo isset($_SESSION['website']) ? $_SESSION['website'] : "" ?>" placeholder="If you have">
                  <?php echo isset($_SESSION['websiteErr']) ? $_SESSION['websiteErr'] : "" ?>
                  <span id="websiteErr"></span>
               </td>
            </tr>
            <tr>
               <td>
                  <label for=""><b>Address:</b></label>
               </td>
               <td>
                  <fieldset>
                     <legend><b>Present Address</b></legend>
                     <table>
                        <tr>
                           <td>
                              <p>
                                 <select name="country" id="country">
                                    <option value="" selected>Select Country</option>
                                    <option value="USA" <?php echo (isset($_SESSION['country']) && $_SESSION['country'] === 'USA') ? 'selected' : '' ?>>USA</option>
                                    <option value="Canada" <?php echo (isset($_SESSION['country']) && $_SESSION['country'] === 'Canada') ? 'selected' : '' ?>>Canada</option>
                                    <option value="UK" <?php echo (isset($_SESSION['country']) && $_SESSION['country'] === 'UK') ? 'selected' : '' ?>>UK</option>
                                    <option value="Bangladesh" <?php echo (isset($_SESSION['country']) && $_SESSION['country'] === 'Bangladesh') ? 'selected' : '' ?>>Bangladesh</option>
                                 </select>
                                 <?php echo isset($_SESSION['countryErr']) ? $_SESSION['countryErr'] : ""; ?>
                                 <span id="countryErr"></span>
                                 <select name="division" id="division">
                                    <option value="" selected>Select Division</option>
                                    <option value="Dhaka" <?php echo (isset($_SESSION['division']) && $_SESSION['division'] === 'Dhaka') ? 'selected' : '' ?>>Dhaka</option>
                                    <option value="Chottogram" <?php echo (isset($_SESSION['division']) && $_SESSION['division'] === 'Chottogram') ? 'selected' : '' ?>>Chottogram</option>
                                    <option value="Khulna" <?php echo (isset($_SESSION['division']) && $_SESSION['division'] === 'Khulna') ? 'selected' : '' ?>>Khulna</option>
                                    <option value="Rangpur" <?php echo (isset($_SESSION['division']) && $_SESSION['division'] === 'Rangpur') ? 'selected' : '' ?>>Rangpur</option>
                                 </select>
                                 <?php echo isset($_SESSION['divisionErr']) ? $_SESSION['divisionErr'] : ""; ?>
                                 <span id="divisionErr"></span>
                              </p>
                              <p>
                                 <textarea name="rsc" id="rsc" placeholder="Road/Street/City" rows="6" cols="30"><?php echo isset($_SESSION['rsc']) ? $_SESSION['rsc'] : "" ?></textarea>
                                 <?php echo isset($_SESSION['rscErr']) ? $_SESSION['rscErr'] : ""; ?>
                                 <span id="postcodeErr"></span>
                              </p>
                              <p>
                                 <input type="text" class="txtbx-up-profile" name="postcode" id="postcode" placeholder="Post Code" value="<?php echo isset($_SESSION['postcode']) ? $_SESSION['postcode'] : "" ?>">
                                 <?php echo isset($_SESSION['postcodeErr']) ? $_SESSION['postcodeErr'] : ""; ?>
                                 <span id="rscErr"></span>
                              </td>
                        </tr>
                     </table>
                  </fieldset>
                  </p>
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
$_SESSION['emailErr'] = "";
$_SESSION['phoneErr'] = "";
$_SESSION['websiteErr'] = "";
$_SESSION['countryErr'] = "";
$_SESSION['divisionErr'] = "";
$_SESSION['rscErr'] = "";
$_SESSION['postcodeErr'] = "";
<?php

?>