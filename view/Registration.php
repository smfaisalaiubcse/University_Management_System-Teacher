<?php
session_start();
if (isset($_SESSION['sd']) and $_SESSION['sd'] == "ok") {
   $_SESSION['firstname'] = isset($_COOKIE["firstname"]) ? $_COOKIE["firstname"] : "";
   $_SESSION['lastname'] = isset($_COOKIE["lastname"]) ? $_COOKIE["lastname"] : "";
   $_SESSION['fathersname'] = isset($_COOKIE["fathersname"]) ? $_COOKIE["fathersname"] : "";
   $_SESSION['mothersname'] = isset($_COOKIE["mothersname"]) ? $_COOKIE["mothersname"] : "";
   $_SESSION['gender'] = isset($_COOKIE["gender"]) ? $_COOKIE["gender"] : "";
   $_SESSION['bloodgroup'] = isset($_COOKIE["bloodgroup"]) ? $_COOKIE["bloodgroup"] : "";
   $_SESSION['religion'] = isset($_COOKIE["religion"]) ? $_COOKIE["religion"] : "";
   $_SESSION['email'] = isset($_COOKIE["email"]) ? $_COOKIE["email"] : "";
   $_SESSION['phone'] = isset($_COOKIE["phone"]) ? $_COOKIE["phone"] : "";
   $_SESSION['website'] = isset($_COOKIE["website"]) ? $_COOKIE["website"] : "";
   $_SESSION['country'] = isset($_COOKIE["country"]) ? $_COOKIE["country"] : "";
   $_SESSION['division'] = isset($_COOKIE["division"]) ? $_COOKIE["division"] : "";
   $_SESSION['rsc'] = isset($_COOKIE["rsc"]) ? $_COOKIE["rsc"] : "";
   $_SESSION['postcode'] = isset($_COOKIE["postcode"]) ? $_COOKIE["postcode"] : "";
   $_SESSION['username'] = isset($_COOKIE["username"]) ? $_COOKIE["username"] : "";
   $_SESSION['SSCScName'] = isset($_COOKIE["SSCScName"]) ? $_COOKIE["SSCScName"] : "";
   $_SESSION['SSCGPA'] = isset($_COOKIE["SSCGPA"]) ? $_COOKIE["SSCGPA"] : "";
   $_SESSION['SSCPY'] = isset($_COOKIE["SSCPY"]) ? $_COOKIE["SSCPY"] : "";
   $_SESSION['HSCScName'] = isset($_COOKIE["HSCScName"]) ? $_COOKIE["HSCScName"] : "";
   $_SESSION['HSCGPA'] = isset($_COOKIE["HSCGPA"]) ? $_COOKIE["HSCGPA"] : "";
   $_SESSION['HSCPY'] = isset($_COOKIE["HSCPY"]) ? $_COOKIE["HSCPY"] : "";
   $_SESSION['BScUnName'] = isset($_COOKIE["BScUnName"]) ? $_COOKIE["BScUnName"] : "";
   $_SESSION['BScCGPA'] = isset($_COOKIE["BScCGPA"]) ? $_COOKIE["BScCGPA"] : "";
   $_SESSION['BScPY'] = isset($_COOKIE["BScPY"]) ? $_COOKIE["BScPY"] : "";
   $_SESSION['MScUnName'] = isset($_COOKIE["MScUnName"]) ? $_COOKIE["MScUnName"] : "";
   $_SESSION['MScCGPA'] = isset($_COOKIE["MScCGPA"]) ? $_COOKIE["MScCGPA"] : "";
   $_SESSION['MScPY'] = isset($_COOKIE["MScPY"]) ? $_COOKIE["MScPY"] : "";
   $_SESSION['sq1'] = isset($_COOKIE["sq1"]) ? $_COOKIE["sq1"] : "";
   $_SESSION['sq2'] = isset($_COOKIE["sq2"]) ? $_COOKIE["sq2"] : "";
   $_SESSION['sq3'] = isset($_COOKIE["sq3"]) ? $_COOKIE["sq3"] : "";
   $_SESSION['sq4'] = isset($_COOKIE["sq4"]) ? $_COOKIE["sq4"] : "";
   $_SESSION['sq5'] = isset($_COOKIE["sq5"]) ? $_COOKIE["sq5"] : "";
   $_SESSION['sq6'] = isset($_COOKIE["sq6"]) ? $_COOKIE["sq6"] : "";
   $_SESSION['password'] = "";
   $_SESSION['confirm_password'] = "";
}

?>
<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" type="text/css" href="styles.css">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="js/registration_validation.js"></script>
   <title>Registration</title>
</head>

<body>
   <form action="../controller/Registration_action.php" method="post" onsubmit="return validateRegForm(this)" enctype="multipart/form-data" novalidate>
      <h1>Registration</h1>
      <?php
      if (isset($_SESSION['me'])) {
         echo "<p>" . $_SESSION['me'] . "</p>";
      }
      ?>

      <div class="reg-container">
         <fieldset class="reg-container-child">
            <legend><b>General Information:</b></legend>
            <table cellspacing="20">
               <tr>
                  <td><label for="firstname"><b>First Name</b> </label></td>
                  <td>: <input type="text" class="txtbx-reg" id="firstname" name="firstname" value="<?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "" ?>">
                     <span class="regErr"><?php echo isset($_SESSION['fnameErr']) ? $_SESSION['fnameErr'] : "" ?></span>
                     <span id="firstnameErr"></span>
                  </td>
               </tr>
               <tr>
                  <td><label for="lastname"><b>Last Name</b> </label></td>
                  <td>: <input type="text" class="txtbx-reg" id="lastname" name="lastname" value="<?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : "" ?>">
                     <span class="regErr"><?php echo isset($_SESSION['lnameErr']) ? $_SESSION['lnameErr'] : "" ?></span>
                     <span id="lastnameErr"></span>
                  </td>
               </tr>
               <tr>
                  <td><label for="fathersname"><b>Father's Name</b> </label> </td>
                  <td>: <input type="text" class="txtbx-reg" name="fathersname" value="<?php echo isset($_SESSION["fathersname"]) ? $_SESSION["fathersname"] : "" ?>">
                     <span class="regErr"><?php echo isset($_SESSION['fathersnameErr']) ? $_SESSION['fathersnameErr'] : "" ?></span>
                     <span id="fathersnameErr"></span>
                  </td>
               </tr>
               <tr>
                  <td><label for="mothersname"><b>Mother's Name <b></label> </td>
                  <td>: <input type="text" class="txtbx-reg" name="mothersname" value="<?php echo isset($_SESSION["mothersname"]) ? $_SESSION["mothersname"] : "" ?>">
                     <span class="regErr"><?php echo isset($_SESSION['mothersnameErr']) ? $_SESSION['mothersnameErr'] : "" ?></span>
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
                     <span class="regErr"><?php echo isset($_SESSION['genderErr']) ? $_SESSION['genderErr'] : "" ?></span>
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
                     <span class="regErr"><?php echo isset($_SESSION['bloodgroupErr']) ? $_SESSION['bloodgroupErr'] : "" ?></span>
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
                     <span class="regErr"><?php echo isset($_SESSION['religionErr']) ? $_SESSION['religionErr'] : "" ?></span>
                     <span id="religionErr"></span>
                  </td>
               </tr>
            </table>
         </fieldset>

         <fieldset class="reg-container-child">
            <legend><b>Contact Information:</b></legend>
            <table cellspacing="20">
               <tr>
                  <td><label for="Email"><b>Email:</b></label></td>
                  <td>: <input type="text" class="txtbx-reg" name="Email" id="Email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
                     <span class="regErr"><?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : "" ?></span>
                     <span id="emailErr"></span>
                  </td>
               </tr>
               <tr>
                  <td><label for="phone"><b>phone/Mobile:</b></label></td>
                  <td>: <input type="text" class="txtbx-reg" name="phone" id="phone/Mobile" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : "" ?>">
                     <span class="regErr"><?php echo isset($_SESSION['phoneErr']) ? $_SESSION['phoneErr'] : "" ?></span>
                     <span id="phoneErr"></span>
                  </td>
               </tr>
               <tr>
                  <td><label for="website"><b>Website:</b></label></td>
                  <td>: <input type="text" class="txtbx-reg" name="website" id="Website" value="<?php echo isset($_SESSION['website']) ? $_SESSION['website'] : "" ?>" placeholder="If you have">
                     <span class="regErr"><?php echo isset($_SESSION['websiteErr']) ? $_SESSION['websiteErr'] : "" ?></span>
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
                                    <span class="regErr"><?php echo isset($_SESSION['countryErr']) ? $_SESSION['countryErr'] : ""; ?></span>
                                    <span id="countryErr"></span>
                                    <select name="division" id="division">
                                       <option value="" selected>Select Division</option>
                                       <option value="Dhaka" <?php echo (isset($_SESSION['division']) && $_SESSION['division'] === 'Dhaka') ? 'selected' : '' ?>>Dhaka</option>
                                       <option value="Chottogram" <?php echo (isset($_SESSION['division']) && $_SESSION['division'] === 'Chottogram') ? 'selected' : '' ?>>Chottogram</option>
                                       <option value="Khulna" <?php echo (isset($_SESSION['division']) && $_SESSION['division'] === 'Khulna') ? 'selected' : '' ?>>Khulna</option>
                                       <option value="Rangpur" <?php echo (isset($_SESSION['division']) && $_SESSION['division'] === 'Rangpur') ? 'selected' : '' ?>>Rangpur</option>
                                    </select>
                                    <span class="regErr"><?php echo isset($_SESSION['divisionErr']) ? $_SESSION['divisionErr'] : ""; ?></span>
                                    <span id="divisionErr"></span>
                                 </p>
                                 <p>
                                    <textarea name="rsc" id="rsc" placeholder="Road/Street/City" rows="6" cols="30"><?php echo isset($_SESSION['rsc']) ? $_SESSION['rsc'] : "" ?></textarea>
                                    <span class="regErr"><?php echo isset($_SESSION['rscErr']) ? $_SESSION['rscErr'] : ""; ?></span>
                                    <span id="rscErr"></span>
                                 </p>
                                 <p>
                                    <input type="text" class="txtbx-reg" name="postcode" id="postcode" placeholder="Post Code" value="<?php echo isset($_SESSION['postcode']) ? $_SESSION['postcode'] : "" ?>">
                                    <span class="regErr"><?php echo isset($_SESSION['postcodeErr']) ? $_SESSION['postcodeErr'] : ""; ?></span>
                                    <span id="postcodeErr"></span>
                              </td>
                           </tr>
                        </table>
                     </fieldset>
                     </p>
                  </td>
               </tr>
            </table>
         </fieldset>

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
                              <td>: <input type="text" class="txtbx-reg" name="SSCScName" value="<?php echo isset($_SESSION['SSCScName']) ? $_SESSION['SSCScName'] : "" ?>">
                                 <span class="regErr"><?php echo isset($_SESSION['SSCScNameErr']) ? $_SESSION['SSCScNameErr'] : ""; ?></span>
                                 <span id="SSCScNameErr"></span>
                              </td>
                           </tr>
                           <tr>
                              <td><label><b>GPA </b></label></td>
                              <td>: <input type="text" class="txtbx-reg" name="SSCGPA" value="<?php echo isset($_SESSION['SSCGPA']) ? $_SESSION['SSCGPA'] : "" ?>">
                                 <span class="regErr"><?php echo isset($_SESSION['SSCGPAErr']) ? $_SESSION['SSCGPAErr'] : ""; ?></span>
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
                                 <span class="regErr"><?php echo isset($_SESSION['SSCPYErr']) ? $_SESSION['SSCPYErr'] : ""; ?></span>
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
                              <td>: <input type="text" class="txtbx-reg" name="HSCClgName" value="<?php echo isset($_SESSION['HSCClgName']) ? $_SESSION['SSCScName'] : "" ?>">
                                 <span class="regErr"><?php echo isset($_SESSION['HSCClgNameErr']) ? $_SESSION['HSCClgNameErr'] : ""; ?></span>
                                 <span id="HSCClgNameErr"></span>
                              </td>
                           </tr>
                           <tr>
                              <td><label><b>GPA </b></label></td>
                              <td>: <input type="text" class="txtbx-reg" name="HSCGPA" value="<?php echo isset($_SESSION['HSCGPA']) ? $_SESSION['HSCGPA'] : "" ?>">
                                 <span class="regErr"><?php echo isset($_SESSION['HSCGPAErr']) ? $_SESSION['HSCGPAErr'] : ""; ?></span>
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
                                 <span class="regErr"><?php echo isset($_SESSION['HSCPYErr']) ? $_SESSION['HSCPYErr'] : ""; ?></span>
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
                              <td>: <input type="text" class="txtbx-reg" name="BScUnName" value="<?php echo isset($_SESSION['BScUnName']) ? $_SESSION['BScUnName'] : "" ?>">
                                 <span class="regErr"><?php echo isset($_SESSION['BScUnNameErr']) ? $_SESSION['BScUnNameErr'] : ""; ?></span>
                                 <span id="BScUnNameErr"></span>
                              </td>
                           </tr>
                           <tr>
                              <td><label><b>CGPA </b></label></td>
                              <td>: <input type="text" class="txtbx-reg" name="BScCGPA" value="<?php echo isset($_SESSION['BScCGPA']) ? $_SESSION['BScCGPA'] : "" ?>">
                                 <span class="regErr"><?php echo isset($_SESSION['BScCGPAErr']) ? $_SESSION['BScCGPAErr'] : ""; ?></span>
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
                                 <span class="regErr"><?php echo isset($_SESSION['BScPYErr']) ? $_SESSION['BScPYErr'] : ""; ?></span>
                                 <span id="BScPYErr"></span>
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
                              <td>: <input type="text" class="txtbx-reg" name="MScUnName" value="<?php echo isset($_SESSION['MScUnName']) ? $_SESSION['MScUnName'] : "" ?>">
                                 <span class="regErr"><?php echo isset($_SESSION['MScUnNameErr']) ? $_SESSION['MScUnNameErr'] : ""; ?></span>
                                 <span id="MScUnNameErr"></span>
                              </td>
                           </tr>
                           <tr>
                              <td><label><b>CGPA </b></label></td>
                              <td>: <input type="text" class="txtbx-reg" name="MScCGPA" value="<?php echo isset($_SESSION['MScCGPA']) ? $_SESSION['MScCGPA'] : "" ?>">
                                 <span class="regErr"><?php echo isset($_SESSION['MScCGPAErr']) ? $_SESSION['MScCGPAErr'] : ""; ?></span>
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
                                 <span class="regErr"><?php echo isset($_SESSION['MScPYErr']) ? $_SESSION['MScPYErr'] : ""; ?></span>
                                 <span id="MScPYErr"></span>
                              </td>
                           </tr>
                        </table>
                     </fieldset>
                  </td>
               </tr>
            </table>

         </fieldset>

         <fieldset class="reg-container-child">
            <legend><b>Security Questions:</b></legend>
            <p><b><i> N.B. You have to set atleast 3 question answer. If you forgot your password<br>then after matching at least 3 answer we will let you to recover your account. </i></b>
            <table cellspacing="20">
               </p>
               <tr>
                  <td>
                     <label for="sq1"><b>1. In what city or town did your <br> mother and father meet?</b> </label>
                  </td>
                  <td>: <input type="text" class="txtbx-reg" name="sq1" id="sq1" value="<?php echo isset($_SESSION['sq1']) ? $_SESSION['sq1'] : "" ?>"></td>
               </tr>

               <tr>
                  <td>
                     <label for="sq2"><b>2. What is your favorite movie?</b> </label>
                  </td>
                  <td>: <input type="text" class="txtbx-reg" name="sq2" id="sq2" value="<?php echo isset($_SESSION['sq2']) ? $_SESSION['sq2'] : "" ?>"></td>
               </tr>

               <tr>
                  <td>
                     <label for="sq3"><b>3. What was your favorite sport in high school? </b> </label>
                  </td>
                  <td>: <input type="text" class="txtbx-reg" name="sq3" id="sq3" value="<?php echo isset($_SESSION['sq3']) ? $_SESSION['sq3'] : "" ?>"></td>
               </tr>

               <tr>
                  <td>
                     <label for="sq4"><b>4. Who was your childhood hero? </b> </label>
                  </td>
                  <td>: <input type="text" class="txtbx-reg" name="sq4" id="sq4" value="<?php echo isset($_SESSION['sq4']) ? $_SESSION['sq4'] : "" ?>"></td>
               </tr>

               <tr>
                  <td>
                     <label for="sq5"><b>5. When you were young, what did you <br> want to be when you grew up?</b> </label>
                  </td>
                  <td>: <input type="text" class="txtbx-reg" name="sq5" id="sq5" value="<?php echo isset($_SESSION['sq5']) ? $_SESSION['sq5'] : "" ?>"></td>
               </tr>

               <tr>
                  <td>
                     <label for="sq6"><b>6. In what city were you born?</b> </label>
                  </td>
                  <td>: <input type="text" class="txtbx-reg" name="sq6" id="sq6" value="<?php echo isset($_SESSION['sq6']) ? $_SESSION['sq6'] : "" ?>"></td>
               </tr>
               <tr>
                  <td>
                     <span class="regErr"><?php echo isset($_SESSION['sqErr']) ? $_SESSION['sqErr'] : ""; ?>
                     </span>
                     <span id="sqErr"></span>
                  </td>
               </tr>
            </table>
         </fieldset>

         <fieldset class="reg-container-child">
            <legend><b>Account information:</b></legend>
            <table cellspacing="20">
               <tr>
                  <p><b><i>N.B.User name must be unique from others</i></b></p>
                  <td><label for="username"><b>Username</b></label></td>
                  <td>
                     :<input type="text" class="txtbx-reg" name="username" id="Username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "" ?>">
                     <span class="regErr"><?php echo isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : ""; ?></span>
                     <span id="usernameErr"></span>
                  </td>
               </tr>
               <tr>
                  <td><label for="password"><b>Password</b></label></td>
                  <td>:
                     <input type="password" class="txtbx-reg" name="password" id="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : "" ?>">
                     <span class="regErr"><?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : ""; ?></span>
                     <span id="passwordErr"></span>
                  </td>
               </tr>
               <tr>
                  <td><label for="confirm_password"><b>Confirm Password</b></label></td>
                  <td>:
                     <input type="password" class="txtbx-reg" name="confirm_password" id="confirm_password" value="<?php echo isset($_SESSION['confirm_password']) ? $_SESSION['confirm_password'] : "" ?>">
                     <span class="regErr"><?php echo isset($_SESSION['confirm_passwordErr']) ? $_SESSION['confirm_passwordErr'] : ""; ?></span>
                     <span id="confirmpasswordErr"></span>
                  </td>
               </tr>
            </table>
         </fieldset>

         <fieldset class="reg-container-child">
            <legend><b>Upload Photo:</b></legend>
            <b>Upload Your Photo: </b><input type="file" name="photo">
            <span class="regErr"><?php echo isset($_SESSION['uploadimgerr']) ? $_SESSION['uploadimgerr'] : ""; ?></span>
            <span id="photoErr"></span>
         </fieldset>
      </div>
      <p>
         <a href="login.php">Already have an account?</a>
         <br><br>
         <input type="hidden" name="submitAction" id="submitAction" value="">
         <button type="submit" class="button1" name="registration" onclick="setSubmitAction('registration')"> Registration </button>
         <button type="submit" class="button1" name="save_draft" onclick="setSubmitAction('save_draft')">Save as Draft</button>
         <button type="submit" class="button1" name="delete_draft" onclick="setSubmitAction('delete_draft')">Delete Draft</button>
      </p>
   </form>
   <script>
      function setSubmitAction(action) {
         document.getElementById('submitAction').value = action;
      }
   </script>
</body>
<?php include 'fotter.php'; ?>

</html>

<?php
$_SESSION['firstname'] = "";
$_SESSION['lastname'] = "";
$_SESSION['fathersname'] = "";
$_SESSION['mothersname'] = "";
$_SESSION['gender'] = "";
$_SESSION['bloodgroup'] = "";
$_SESSION['religion'] = "";
$_SESSION['email'] = "";
$_SESSION['phone'] = "";
$_SESSION['website'] = "";
$_SESSION['country'] = "";
$_SESSION['division'] = "";
$_SESSION['rsc'] = "";
$_SESSION['postcode'] = "";
$_SESSION['username'] = "";
$_SESSION['password'] = "";
$_SESSION['confirm_password'] = "";
$_SESSION['uploadimgerr'] = "";
$_SESSION['sq1'] = "";
$_SESSION['sq2'] = "";
$_SESSION['sq3'] = "";
$_SESSION['sq4'] = "";
$_SESSION['sq5'] = "";
$_SESSION['sq6'] = "";

//errs
$_SESSION['fnameErr'] = "";
$_SESSION['lnameErr'] = "";
$_SESSION['fathersnameErr'] = "";
$_SESSION['mothersnameErr'] = "";
$_SESSION['genderErr'] = "";
$_SESSION['bloodgroupErr'] = "";
$_SESSION['religionErr'] = "";
$_SESSION['emailErr'] = "";
$_SESSION['phoneErr'] = "";
$_SESSION['websiteErr'] = "";
$_SESSION['countryErr'] = "";
$_SESSION['divisionErr'] = "";
$_SESSION['rscErr'] = "";
$_SESSION['postcodeErr'] = "";
$_SESSION['usernameErr'] = "";
$_SESSION['passwordErr'] = "";
$_SESSION['confirm_passwordErr'] = "";
$_SESSION['passwordErr'] = "";
$_SESSION['uploadimgerr'] = "";
$_SESSION['sqErr'] = "";
$_SESSION['SSCScName'] = "";
$_SESSION['SSCGPA'] = "";
$_SESSION['SSCPY'] = "";
$_SESSION['HSCScName'] = "";
$_SESSION['HSCGPA'] = "";
$_SESSION['HSCPY'] = "";
$_SESSION['BScUnName'] = "";
$_SESSION['BScCGPA'] = "";
$_SESSION['BScPY'] = "";
$_SESSION['MScUnName'] = "";
$_SESSION['MScCGPA'] = "";
$_SESSION['MScPY'] = "";

//academic infos
$_SESSION['SSCScNameErr'] = "";
$_SESSION['SSCGPAErr'] = "";
$_SESSION['SSCPYErr'] = "";
$_SESSION['HSCClgNameErr'] = "";
$_SESSION['HSCGPAErr'] = "";
$_SESSION['HSCPYErr'] = "";
$_SESSION['BScUnNameErr'] = "";
$_SESSION['BScCGPAErr'] = "";
$_SESSION['BScPYErr'] = "";
$_SESSION['MScUnNameErr'] = "";
$_SESSION['MScCGPAErr'] = "";
$_SESSION['MScPYErr'] = "";
$_SESSION['me'] = "";
?>