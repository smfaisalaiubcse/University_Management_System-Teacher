<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['save_draft'])) {
        setcookie("firstname", $_POST['firstname'], time() + 86400, "/");
        setcookie("lastname", $_POST['lastname'], time() + 86400, "/");
        setcookie("fathersname", $_POST['fathersname'], time() + 86400, "/");
        setcookie("mothersname", $_POST['mothersname'], time() + 86400, "/");
        setcookie("gender", $_POST['gender'], time() + 86400, "/");
        setcookie("bloodgroup", $_POST['bloodgroup'], time() + 86400, "/");
        setcookie("religion", $_POST['religion'], time() + 86400, "/");
        setcookie("email", $_POST['Email'], time() + 86400, "/");
        setcookie("phone", $_POST['phone'], time() + 86400, "/");
        setcookie("website", $_POST['website'], time() + 86400, "/");
        setcookie("country", $_POST['country'], time() + 86400, "/");
        setcookie("division", $_POST['division'], time() + 86400, "/");
        setcookie("rsc", $_POST['rsc'], time() + 86400, "/");
        setcookie("postcode", $_POST['postcode'], time() + 86400, "/");
        setcookie("username", $_POST['username'], time() + 86400, "/");
        setcookie("SSCScName", $_POST['SSCScName'], time() + 86400, "/");
        setcookie("SSCGPA", $_POST['SSCGPA'], time() + 86400, "/");
        setcookie("SSCPY", $_POST['SSCPY'], time() + 86400, "/");
        setcookie("HSCScName", $_POST['HSCScName'], time() + 86400, "/");
        setcookie("HSCGPA", $_POST['HSCGPA'], time() + 86400, "/");
        setcookie("HSCPY", $_POST['HSCPY'], time() + 86400, "/");
        setcookie("BScUnName", $_POST['BScUnName'], time() + 86400, "/");
        setcookie("BScCGPA", $_POST['BScCGPA'], time() + 86400, "/");
        setcookie("BScPY", $_POST['BScPY'], time() + 86400, "/");
        setcookie("MScUnName", $_POST['MScUnName'], time() + 86400, "/");
        setcookie("MScCGPA", $_POST['MScCGPA'], time() + 86400, "/");
        setcookie("MScPY", $_POST['MScPY'], time() + 86400, "/");
        setcookie("sq1", $_POST['sq1'], time() + 86400, "/");
        setcookie("sq2", $_POST['sq2'], time() + 86400, "/");
        setcookie("sq3", $_POST['sq3'], time() + 86400, "/");
        setcookie("sq4", $_POST['sq4'], time() + 86400, "/");
        setcookie("sq5", $_POST['sq5'], time() + 86400, "/");
        setcookie("sq6", $_POST['sq6'], time() + 86400, "/");
        $_SESSION['me'] = "Last Modification Time: " . date('Y-m-d H:i:s', time()) . "Your data's are saved. They will be deleted on " . date('Y-m-d H:i:s', time() + 86400);

        $_SESSION['sd'] = "ok";

        header("Location: ../view/Registration.php");
    }
    if (isset($_POST['delete_draft'])) {
        // Clear cookies
        setcookie("firstname", "", time() - 3600, "/");
        setcookie("lastname", "", time() - 3600, "/");
        setcookie("fathersname", "", time() - 3600, "/");
        setcookie("mothersname", "", time() - 3600, "/");
        setcookie("gender", "", time() - 3600, "/");
        setcookie("bloodgroup", "", time() - 3600, "/");
        setcookie("religion", "", time() - 3600, "/");
        setcookie("email", "", time() - 3600, "/");
        setcookie("phone", "", time() - 3600, "/");
        setcookie("website", "", time() - 3600, "/");
        setcookie("country", "", time() - 3600, "/");
        setcookie("division", "", time() - 3600, "/");
        setcookie("rsc", "", time() - 3600, "/");
        setcookie("postcode", "", time() - 3600, "/");
        setcookie("username", "", time() - 3600, "/");
        setcookie("SSCScName", "", time() - 3600, "/");
        setcookie("SSCGPA", "", time() - 3600, "/");
        setcookie("SSCPY", "", time() - 3600, "/");
        setcookie("HSCScName", "", time() - 3600, "/");
        setcookie("HSCGPA", "", time() - 3600, "/");
        setcookie("HSCPY", "", time() - 3600, "/");
        setcookie("BScUnName", "", time() - 3600, "/");
        setcookie("BScCGPA", "", time() - 3600, "/");
        setcookie("BScPY", "", time() - 3600, "/");
        setcookie("MScUnName", "", time() - 3600, "/");
        setcookie("MScCGPA", "", time() - 3600, "/");
        setcookie("MScPY", "", time() - 3600, "/");
        setcookie("sq1", "", time() - 3600, "/");
        setcookie("sq2", "", time() - 3600, "/");
        setcookie("sq3", "", time() - 3600, "/");
        setcookie("sq4", "", time() - 3600, "/");
        setcookie("sq5", "", time() - 3600, "/");
        setcookie("sq6", "", time() - 3600, "/");

        $_SESSION['firstname'] = "";
        $_SESSION['lastname'] = "";
        $_SESSION['fathersname'] = "";
        $_SESSION['mothersname'] = "";
        $_SESSION['gender'] = "";
        $_SESSION['bloodgroup'] = "";
        $_SESSION['religion'] = "";
        $_SESSION['email'] = "";
        $_SESSION['Phone'] = "";
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
        $_SESSION['sd'] = "not-ok";
        $_SESSION['me'] = "Draft data's were deleted!!";
        header("Location: ../view/Registration.php");
    }

    if (isset($_POST['registration'])) {
        $flag = true;
        // First Name validation
        $firstname = test_input($_POST['firstname']);
        if (empty($firstname)) {
            $_SESSION['fnameErr'] = "*First Name is empty";
            $flag = false;
        } elseif (!preg_match("/^[a-zA-Z ]+$/", $firstname)) {
            $_SESSION['fnameErr'] = "*First Name can only contain letters (A-Z, a-z)";
            $_SESSION['firstname'] = $firstname;
            $flag = false;
        } else {
            $_SESSION['fnameErr'] = "";
            $_SESSION['firstname'] = $firstname;
        }

        // Last Name validation
        $lastname = test_input($_POST['lastname']);
        if (empty($lastname)) {
            $_SESSION['lnameErr'] = "*Last Name is empty";
            $flag = false;
        } elseif (!preg_match("/^[a-zA-Z ]+$/", $lastname)) {
            $_SESSION['lnameErr'] = "*Last Name can only contain letters (A-Z, a-z)";
            $_SESSION['lastname'] = $lastname;
            $flag = false;
        } else {
            $_SESSION['lnameErr'] = "";
            $_SESSION['lastname'] = $lastname;
        }


        // Father's Name validation
        $fathersname = test_input($_POST['fathersname']);
        if (empty($fathersname)) {
            $_SESSION['fathersnameErr'] = "*Father's Name is empty";
            $flag = false;
        } elseif (!preg_match("/^[a-zA-Z ]+$/", $fathersname)) {
            $_SESSION['fathersnameErr'] = "*Father's Name can only contain letters (A-Z, a-z)";
            $flag = false;
            $_SESSION['fathersname'] = $fathersname;
        } else {
            $_SESSION['fathersnameErr'] = "";
            $_SESSION['fathersname'] = $fathersname;
        }

        // Mother's Name validation
        $mothersname = test_input($_POST['mothersname']);
        if (empty($mothersname)) {
            $_SESSION['mothersnameErr'] = "*Mother's Name is empty";
            $flag = false;
        } elseif (!preg_match("/^[a-zA-Z ]+$/", $mothersname)) {
            $_SESSION['mothersnameErr'] = "*Mother's Name can only contain letters (A-Z, a-z)";
            $flag = false;
            $_SESSION['mothersname'] = $mothersname;
        } else {
            $_SESSION['mothersnameErr'] = "";
            $_SESSION['mothersname'] = $mothersname;
        }


        //gender validation
        $gender = test_input($_POST['gender']);
        if (empty($gender)) {
            $_SESSION['genderErr'] = "*Gender is Empty";
            $flag = false;
        } else {
            $_SESSION['genderErr'] = "";
            $_SESSION['gender'] = $gender;
        }

        //bloodgroup validation
        $bloodgroup = test_input($_POST['bloodgroup']);
        if (empty($bloodgroup)) {
            $_SESSION['bloodgroupErr'] = "*bloodgroup is Empty";
            $flag = false;
        } else {
            $_SESSION['bloodgroupErr'] = "";
            $_SESSION['bloodgroup'] = $bloodgroup;
        }

        //religion validation
        $religion = test_input($_POST['religion']);
        if (empty($religion)) {
            $_SESSION['religionErr'] = "*religion is Empty";
            $flag = false;
        } else {
            $_SESSION['religionErr'] = "";
            $_SESSION['religion'] = $religion;
        }

        // Email validation
        $email = test_input($_POST['Email']);
        if (empty($email)) {
            $_SESSION['emailErr'] = "*Email field is Empty";
            $flag = false;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErr'] = "*Invalid Email format";
            $flag = false;
        } else {
            $_SESSION['emailErr'] = "";
            $_SESSION['email'] = $email;
        }

        // Phone/Mobile validation
        $phone = test_input($_POST['phone']);
        if (empty($phone)) {
            $_SESSION['phoneErr'] = "*Phone is empty";
            $_SESSION['phone'] = $phone;
            $flag = false;
        } elseif (!preg_match("/^[0-9\+](\d{10}|\d{13})$/", $phone)) {
            $_SESSION['phoneErr'] = "*Phone must be exactly 11 or 14 digits and can only contain digits and the + sign";
            $_SESSION['phone'] = $phone;
            $flag = false;
        } else {
            $_SESSION['phoneErr'] = "";
            $_SESSION['phone'] = $phone;
        }



        $website = test_input($_POST['website']);
        if (empty($website)) {
            $_SESSION['website'] = "";
            $_SESSION['websiteErr'] = "";
        } else {
            if (!filter_var($website, FILTER_VALIDATE_URL)) {
                $_SESSION['websiteErr'] = "*Invalid website format";
                $flag = false;
            } else {
                $_SESSION['websiteErr'] = "";
                $_SESSION['website'] = $website;
            }
        }

        //country validation
        $country = test_input($_POST['country']);
        if (empty($country)) {
            $_SESSION['countryErr'] = "*Incomplete country";
            $flag = false;
        } else {
            $_SESSION['countryErr'] = "";
            $_SESSION['country'] = $country;
        }

        //division validation
        $division = test_input($_POST['division']);
        if (empty($division)) {
            $_SESSION['divisionErr'] = "*Incomplete division";
            $flag = false;
        } else {
            $_SESSION['divisionErr'] = "";
            $_SESSION['division'] = $division;
        }

        //division rsc
        $rsc = test_input($_POST['rsc']);
        if (empty($rsc)) {
            $_SESSION['rscErr'] = "*Incomplete road/street/city";
            $flag = false;
        } else {
            $_SESSION['rscErr'] = "";
            $_SESSION['rsc'] = $rsc;
        }

        $postcode = test_input($_POST['postcode']);
        if (empty($postcode)) {
            $_SESSION['postcodeErr'] = "*Incomplete postcode";
            $flag = false;
        } else {
            $_SESSION['postcodeErr'] = "";
            $_SESSION['postcode'] = $postcode;
        }

        $username = test_input($_POST['username']);
        if (empty($username)) {
            $_SESSION['usernameErr'] = "*Incomplete username";
            $flag = false;
        } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
            $_SESSION['usernameErr'] = "*Username can only contain letters and numbers";
            $flag = false;
        } else {
            $_SESSION['usernameErr'] = "";
            $_SESSION['username'] = $username;
        }

        // Password validation
        $password = test_input($_POST['password']);
        if (empty($password)) {
            $_SESSION['passwordErr'] = "*Incomplete password";
            $flag = false;
        } else {
            $_SESSION['passwordErr'] = "";
            $_SESSION['password'] = $password;
        }

        // Confirm Password validation
        $confirm_password = test_input($_POST['confirm_password']);
        if (empty($confirm_password)) {
            $_SESSION['confirm_passwordErr'] = "*Incomplete confirm password";
            $flag = false;
        } else {
            $_SESSION['confirm_passwordErr'] = "";
            $_SESSION['confirm_password'] = $confirm_password;
        }
        if ($_SESSION['passwordErr'] == "" and $_SESSION['confirm_passwordErr'] == "") {
            // Handle Password and Confirm Password matching
            if ($password !== $confirm_password) {
                $_SESSION['passwordErr'] = "*Passwords and confirm password do not match";
                $flag = false;
            } else {
                $_SESSION['passwordErr'] = "";
            }
        }

        //imageupload
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        if (empty($_FILES['photo']['name'])) {
            $flag = false;
            $_SESSION['uploadimgerr'] = "*Please select a image file first";
        } else if ($_FILES['photo']['type'] !== "image/jpeg" && $_FILES['photo']['type'] !== "image/png") {
            // echo "Please upload a jpg file";
            $flag = false;
            $_SESSION['uploadimgerr'] = "*Please upload a jpg/png file";
        }
        // else if (file_exists($target_file)) {
        //   echo "Sorry, file already exists.";
        // }
        else if ($_FILES["photo"]["size"] > 1000000) {
            // echo "Sorry, your file is not more than 512 KB.";
            $_SESSION['uploadimgerr'] = "*Sorry, your file is more than 1 MB";
            $flag = false;
        } else {
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
            $_SESSION['uploadimgerr'] = "";
            $image = $_FILES['photo']['name'];
            // echo $_POST['fullname'] . " " . "Congratulations! Your file has been uploaded";
        }

        //Academic information: 
        //SSC Informations:

        //SSC School Name
        $SSCScName = test_input($_POST['SSCScName']);
        if (empty($SSCScName)) {
            $_SESSION['SSCScNameErr'] = "*Incomplete SSC School Name";
            $flag = false;
        } else {
            $_SESSION['SSCScNameErr'] = "";
            $_SESSION['SSCScName'] = $SSCScName;
        }

        //SSC GPA
        $SSCGPA = test_input($_POST['SSCGPA']);
        if (empty($SSCGPA)) {
            $_SESSION['SSCGPAErr'] = "*Incomplete SSC GPA";
            $flag = false;
        } elseif (!filter_var($SSCGPA, FILTER_VALIDATE_FLOAT)) {
            $_SESSION['SSCGPAErr'] = "*SSC GPA must be a valid float number";
            $flag = false;
            $_SESSION['SSCGPA'] = $SSCGPA;
        } else {
            $_SESSION['SSCGPAErr'] = "";
            $_SESSION['SSCGPA'] = $SSCGPA;
        }


        //SSC Passing Year
        $SSCPY = test_input($_POST['SSCPY']);
        if (empty($SSCPY)) {
            $_SESSION['SSCPYErr'] = "*Incomplete SSC Passing Year";
            $flag = false;
        } else {
            $_SESSION['SSCPYErr'] = "";
            $_SESSION['SSCPY'] = $SSCPY;
        }

        //HSC Informations:

        //HSC School Name
        $HSCClgName = test_input($_POST['HSCClgName']);
        if (empty($HSCClgName)) {
            $_SESSION['HSCClgNameErr'] = "*Incomplete HSC College Name";
            $flag = false;
        } else {
            $_SESSION['HSCClgNameErr'] = "";
            $_SESSION['HSCClgName'] = $HSCClgName;
        }

        //HSC GPA
        $HSCGPA = test_input($_POST['HSCGPA']);
        if (empty($HSCGPA)) {
            $_SESSION['HSCGPAErr'] = "*Incomplete HSC GPA";
            $flag = false;
        } else {
            $_SESSION['HSCGPAErr'] = "";
            $_SESSION['HSCGPA'] = $HSCGPA;
        }

        //HSC Passing Year
        $HSCPY = test_input($_POST['HSCPY']);
        if (empty($HSCPY)) {
            $_SESSION['HSCPYErr'] = "*Incomplete HSC Passing Year";
            $flag = false;
        } else {
            $_SESSION['HSCPYErr'] = "";
            $_SESSION['HSCPY'] = $HSCPY;
        }

        //BSc Informations:

        //BSc School Name
        $BScUnName = test_input($_POST['BScUnName']);
        if (empty($BScUnName)) {
            $_SESSION['BScUnNameErr'] = "*Incomplete BSc University Name";
            $flag = false;
        } else {
            $_SESSION['BScUnNameErr'] = "";
            $_SESSION['BScUnName'] = $BScUnName;
        }

        //BSc GPA
        $BScCGPA = test_input($_POST['BScCGPA']);
        if (empty($BScCGPA)) {
            $_SESSION['BScCGPAErr'] = "*Incomplete BSc CGPA";
            $flag = false;
        } else {
            $_SESSION['BScCGPAErr'] = "";
            $_SESSION['BScCGPA'] = $BScCGPA;
        }

        //BSc Passing Year
        $BScPY = test_input($_POST['BScPY']);
        if (empty($BScPY)) {
            $_SESSION['BScPYErr'] = "*Incomplete BSc Passing Year";
            $flag = false;
        } else {
            $_SESSION['BScPYErr'] = "";
            $_SESSION['BScPY'] = $BScPY;
        }
        //MSc Informations:

        //MSc School Name
        $MScUnName = test_input($_POST['MScUnName']);
        if (empty($MScUnName)) {
            $_SESSION['MScUnNameErr'] = "*Incomplete MSc University Name";
            $flag = false;
        } else {
            $_SESSION['MScUnNameErr'] = "";
            $_SESSION['MScUnName'] = $MScUnName;
        }

        //MSc GPA
        $MScCGPA = test_input($_POST['MScCGPA']);
        if (empty($MScCGPA)) {
            $_SESSION['MScCGPAErr'] = "*Incomplete MSc CGPA";
            $flag = false;
        } else {
            $_SESSION['MScCGPAErr'] = "";
            $_SESSION['MScCGPA'] = $MScCGPA;
        }

        //MSc Passing Year
        $MScPY = test_input($_POST['MScPY']);
        if (empty($MScPY)) {
            $_SESSION['MScPYErr'] = "*Incomplete MSc Passing Year";
            $flag = false;
        } else {
            $_SESSION['MScPYErr'] = "";
            $_SESSION['MScPY'] = $MScPY;
        }

        //security questions
        $cnt = 0;
        //sq1
        $sq1 = test_input($_POST['sq1']);
        if (empty($sq1)) {
            $cnt++;
        } else {
            $_SESSION['sq1'] = $sq1;
        }
        //sq2
        $sq2 = test_input($_POST['sq2']);
        if (empty($sq2)) {
            $cnt++;
        } else {
            $_SESSION['sq2'] = $sq2;
        }
        //sq3
        $sq3 = test_input($_POST['sq3']);
        if (empty($sq3)) {
            $cnt++;
        } else {
            $_SESSION['sq3'] = $sq3;
        }
        //sq4
        $sq4 = test_input($_POST['sq4']);
        if (empty($sq4)) {
            $cnt++;
        } else {
            $_SESSION['sq4'] = $sq4;
        }
        //sq5
        $sq5 = test_input($_POST['sq5']);
        if (empty($sq5)) {
            $cnt++;
        } else {
            $_SESSION['sq5'] = $sq5;
        }
        //sq6
        $sq6 = test_input($_POST['sq6']);
        if (empty($sq6)) {
            $cnt++;
        } else {
            $_SESSION['sq6'] = $sq6;
        }

        if ($cnt > 3) {
            $flag = false;
            $_SESSION['sqErr'] = "*You have to set atleast 3 question answer field.";
        } else {
            $_SESSION['sqErr'] = "";
        }
        include_once '../model/registrationDB.php';
        if ($flag) {
            if (checkUsernameExists($username)) {
                // Username already exists
                $_SESSION['usernameErr'] = "*Username already exists. Please choose a different username.";
                header("Location: ../controller/Registration.php"); // Redirect back to the registration form
            } else {
                if (insertUserInfo($username, $password, $firstname, $lastname, $fathersname, $mothersname, $gender, $bloodgroup, $religion, $email, $phone, $website, $country, $division, $rsc, $postcode, $image, $sq1, $sq2, $sq3, $sq4, $sq5, $sq6, $SSCScName, $SSCGPA, $SSCPY, $HSCClgName, $HSCGPA, $HSCPY, $BScUnName, $BScCGPA, $BScPY, $MScUnName, $MScCGPA, $MScPY)) {
                    $_SESSION['authenticated'] = true;
                    $_SESSION['username'] = $username;
                    // Clear cookies
                    setcookie("firstname", "", time() - 3600, "/");
                    setcookie("lastname", "", time() - 3600, "/");
                    setcookie("fathersname", "", time() - 3600, "/");
                    setcookie("mothersname", "", time() - 3600, "/");
                    setcookie("gender", "", time() - 3600, "/");
                    setcookie("bloodgroup", "", time() - 3600, "/");
                    setcookie("religion", "", time() - 3600, "/");
                    setcookie("email", "", time() - 3600, "/");
                    setcookie("phone", "", time() - 3600, "/");
                    setcookie("website", "", time() - 3600, "/");
                    setcookie("country", "", time() - 3600, "/");
                    setcookie("division", "", time() - 3600, "/");
                    setcookie("rsc", "", time() - 3600, "/");
                    setcookie("postcode", "", time() - 3600, "/");
                    setcookie("username", "", time() - 3600, "/");
                    setcookie("SSCScName", "", time() - 3600, "/");
                    setcookie("SSCGPA", "", time() - 3600, "/");
                    setcookie("SSCPY", "", time() - 3600, "/");
                    setcookie("HSCScName", "", time() - 3600, "/");
                    setcookie("HSCGPA", "", time() - 3600, "/");
                    setcookie("HSCPY", "", time() - 3600, "/");
                    setcookie("BScUnName", "", time() - 3600, "/");
                    setcookie("BScCGPA", "", time() - 3600, "/");
                    setcookie("BScPY", "", time() - 3600, "/");
                    setcookie("MScUnName", "", time() - 3600, "/");
                    setcookie("MScCGPA", "", time() - 3600, "/");
                    setcookie("MScPY", "", time() - 3600, "/");
                    setcookie("sq1", "", time() - 3600, "/");
                    setcookie("sq2", "", time() - 3600, "/");
                    setcookie("sq3", "", time() - 3600, "/");
                    setcookie("sq4", "", time() - 3600, "/");
                    setcookie("sq5", "", time() - 3600, "/");
                    setcookie("sq6", "", time() - 3600, "/");
                    $_SESSION['sd'] = "not-ok";
                    $_SESSION['me'] = "";
                    $_SESSION['validation_problem'] = false;
                    $_SESSION['notification'] = "You are registered successfully.";
                    header("Location: ../view/Dashboard.php");
                } else {
                    echo "database connection prb";
                }
            }
        } else {
            $_SESSION['me'] = "Problem!!";
            $_SESSION['validation_problem'] = true;
            header("Location: ../view/registration.php");
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
