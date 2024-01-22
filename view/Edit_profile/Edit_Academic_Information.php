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
   <script src="../js/editacademicinfo_validation.js"></script>
   <title>Edit Contact Information</title>
</head>

<body>
   <?php include 'Header.php'; ?>
   <?php include 'Edit_Profile_Header.php'; ?>
   <form class="form-type-1" action="../../controller/Edit_Academic_Information_action.php" method="post" onsubmit = "return validateAcInfoForm(this)" novalidate>
      <fieldset class="reg-container-child">
         <legend><b>Academic information:</b></legend>

         <table cellspacing="10">
            <tr>
               <td>
                  <fieldset>
                     <legend><b>SSC Informations: </b></legend>
                     <table cellspacing="10">
                        <tr>
                           <td><label><b>School Name </b></label></td>
                           <td>: <input type="text" class="txtbx-up-profile" name="SSCScName" value="<?php echo isset($_SESSION['SSCScName']) ? $_SESSION['SSCScName'] : "" ?>">
                              <?php echo isset($_SESSION['SSCScNameErr']) ? $_SESSION['SSCScNameErr'] : ""; ?>
                              <span id="SSCScNameErr"></span>
                           </td>
                        </tr>
                        <tr>
                           <td><label><b>GPA </b></label></td>
                           <td>: <input type="text" class="txtbx-up-profile" name="SSCGPA" value="<?php echo isset($_SESSION['SSCGPA']) ? $_SESSION['SSCGPA'] : "" ?>">
                              <?php echo isset($_SESSION['SSCGPAErr']) ? $_SESSION['SSCGPAErr'] : ""; ?>
                              <span id="SSCGPAErr"></span>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <label><b>Passing Year</b></label>
                           </td>
                           <td>
                              :
                              <select name="SSCPY">
                                 <option value="" selected>Select a year</option>
                                 <?php
                                 $currentYear = date("Y") + 20;
                                 $startYear = $currentYear - 50;

                                 for ($year = $currentYear; $year >= $startYear; $year--) {
                                    $selected = isset($_SESSION['SSCPY']) && $_SESSION['SSCPY'] == $year ? 'selected' : '';
                                    echo "<option value='$year' $selected>$year</option>";
                                 }
                                 ?>
                              </select>
                              <?php echo isset($_SESSION['SSCPYErr']) ? $_SESSION['SSCPYErr'] : ""; ?>
                              <span id="SSCPYErr"></span>
                           </td>

                        </tr>
                     </table>
                  </fieldset>
               </td>
            </tr>
         </table>

         <table cellspacing="10">
            <tr>
               <td>
                  <fieldset>
                     <legend><b>HSC Informations: </b></legend>
                     <table cellspacing="10">
                        <tr>
                           <td><label><b>College Name </b></label></td>
                           <td>: <input type="text" class="txtbx-up-profile" name="HSCClgName" value="<?php echo isset($_SESSION['HSCClgName']) ? $_SESSION['SSCScName'] : "" ?>">
                              <?php echo isset($_SESSION['HSCClgNameErr']) ? $_SESSION['HSCClgNameErr'] : ""; ?>
                              <span id="HSCClgNameErr"></span>
                           </td>
                        </tr>
                        <tr>
                           <td><label><b>GPA </b></label></td>
                           <td>: <input type="text" class="txtbx-up-profile" name="HSCGPA" value="<?php echo isset($_SESSION['HSCGPA']) ? $_SESSION['HSCGPA'] : "" ?>">
                              <?php echo isset($_SESSION['HSCGPAErr']) ? $_SESSION['HSCGPAErr'] : ""; ?>
                              <span id="HSCGPAErr"></span>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <label><b>Passing Year</b></label>
                           </td>
                           <td>
                              :
                              <select name="HSCPY">
                                 <option value="" selected>Select a year</option>
                                 <?php
                                 $currentYear = date("Y") + 20;
                                 $startYear = $currentYear - 50;

                                 for ($year = $currentYear; $year >= $startYear; $year--) {
                                    $selected = isset($_SESSION['HSCPY']) && $_SESSION['HSCPY'] == $year ? 'selected' : '';
                                    echo "<option value='$year' $selected>$year</option>";
                                 }
                                 ?>
                              </select>
                              <?php echo isset($_SESSION['HSCPYErr']) ? $_SESSION['HSCPYErr'] : ""; ?>
                              <span id="HSCPYErr"></span>
                           </td>

                        </tr>
                     </table>
                  </fieldset>
               </td>
            </tr>
         </table>

         <table cellspacing="10">
            <tr>
               <td>
                  <fieldset>
                     <legend><b>BSc Informations: </b></legend>
                     <table cellspacing="10">
                        <tr>
                           <td><label><b>University Name </b></label></td>
                           <td>: <input type="text" class="txtbx-up-profile" name="BScUnName" value="<?php echo isset($_SESSION['BScUnName']) ? $_SESSION['BScUnName'] : "" ?>">
                              <?php echo isset($_SESSION['BScUnNameErr']) ? $_SESSION['BScUnNameErr'] : ""; ?>
                              <span id="BScUnNameErr"></span>
                           </td>
                        </tr>
                        <tr>
                           <td><label><b>CGPA </b></label></td>
                           <td>: <input type="text" class="txtbx-up-profile" name="BScCGPA" value="<?php echo isset($_SESSION['BScCGPA']) ? $_SESSION['BScCGPA'] : "" ?>">
                              <?php echo isset($_SESSION['BScCGPAErr']) ? $_SESSION['BScCGPAErr'] : ""; ?>
                              <span id="BScCGPAErr"></span>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <label><b>Passing Year</b></label>
                           </td>
                           <td>
                              :
                              <select name="BScPY">
                                 <option value="" selected>Select a year</option>
                                 <?php
                                 $currentYear = date("Y") + 20;
                                 $startYear = $currentYear - 50;

                                 for ($year = $currentYear; $year >= $startYear; $year--) {
                                    $selected = isset($_SESSION['BScPY']) && $_SESSION['BScPY'] == $year ? 'selected' : '';
                                    echo "<option value='$year' $selected>$year</option>";
                                 }
                                 ?>
                              </select>
                              <span id="BScPYErr"></span>
                              <?php echo isset($_SESSION['BScPYErr']) ? $_SESSION['BScPYErr'] : ""; ?>
                           </td>

                        </tr>
                     </table>
                  </fieldset>
               </td>
            </tr>
         </table>

         <table cellspacing="10">
            <tr>
               <td>
                  <fieldset>
                     <legend><b>MSc Informations: </b></legend>
                     <table cellspacing="10">
                        <tr>
                           <td><label><b>University Name </b></label></td>
                           <td>: <input type="text" class="txtbx-up-profile" name="MScUnName" value="<?php echo isset($_SESSION['MScUnName']) ? $_SESSION['MScUnName'] : "" ?>">
                              <?php echo isset($_SESSION['MScUnNameErr']) ? $_SESSION['MScUnNameErr'] : ""; ?>
                              <span id="MScUnNameErr"></span>
                           </td>
                        </tr>
                        <tr>
                           <td><label><b>CGPA </b></label></td>
                           <td>: <input type="text" class="txtbx-up-profile" name="MScCGPA" value="<?php echo isset($_SESSION['MScCGPA']) ? $_SESSION['MScCGPA'] : "" ?>">
                              <?php echo isset($_SESSION['MScCGPAErr']) ? $_SESSION['MScCGPAErr'] : ""; ?>
                              <span id="MScCGPAErr"></span>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <label><b>Passing Year</b></label>
                           </td>
                           <td>
                              :
                              <select name="MScPY">
                                 <option value="" selected>Select a year</option>
                                 <?php
                                 $currentYear = date("Y") + 20;
                                 $startYear = $currentYear - 50;

                                 for ($year = $currentYear; $year >= $startYear; $year--) {
                                    $selected = isset($_SESSION['MScPY']) && $_SESSION['MScPY'] == $year ? 'selected' : '';
                                    echo "<option value='$year' $selected>$year</option>";
                                 }
                                 ?>
                              </select>
                              <?php echo isset($_SESSION['MScPYErr']) ? $_SESSION['MScPYErr'] : ""; ?>
                              <span id="MScPYErr"></span>
                           </td>

                        </tr>
                     </table>
                  </fieldset>
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

<?php include_once '../resetAllSessionVariables.php' ?>