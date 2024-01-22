function validateChangePassForm(pform) {
    console.log("form submitted");
    const currentPassword = pform.currentPassword.value;
    const newpassword = pform.newpassword.value;
    const confirm_new_password = pform.confirm_new_password.value;

    const currentPasswordErr = document.getElementById('currentPasswordErr');
    const newpasswordErr = document.getElementById('newpasswordErr');
    const confirm_new_passwordErr = document.getElementById('confirm_new_passwordErr');

    currentPasswordErr.innerHTML = "";
    newpasswordErr.innerHTML = "";
    confirm_new_passwordErr.innerHTML = "";

    let flag = true;
    if (currentPassword === "") {
        currentPasswordErr.innerHTML = 'Please enter a currentpassword.';
        currentPasswordErr.style.color = "orange";
        flag = false;
    } 

    if (newpassword === "") {
        newpasswordErr.innerHTML = 'Please enter a newpassword.';
        newpasswordErr.style.color = "orange";
        flag = false;
    } else if (newpassword.length < 8) {
        newpasswordErr.innerHTML = 'newPassword must be at least 8 characters long.';
        newpasswordErr.style.color = "red";
        flag = false;
    }

    if (confirm_new_password === "") {
        confirm_new_passwordErr.innerHTML = 'Please enter confirm_new a password.';
        confirm_new_passwordErr.style.color = "orange";
        flag = false;
    } else if (newpassword !== confirm_new_password) {
        confirm_new_passwordErr.innerHTML = 'New Password and confirm new password do not match.';
        confirm_new_passwordErr.style.color = "orange";
        flag = false;
    }
    // if(flag) {
    //     let xhttp = new XMLHttpRequest();
    //     xhttp.open('POST', '../controller/assign_assignment_action.php', true);
    //     xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    //     let std = {
    //         'assignment_title': assignment_title,
    //         'due_date': due_date,
    //         'course_id': course_id,
    //         'assignment_marks': assignment_marks
    //     }
    //     let data = JSON.stringify(std);
    //     xhttp.onreadystatechange = function () {
    //         if (this.readyState == 4) {
    //             if (this.status == 200) {
    //                 // alert("Course id:" + course_id);
    //                 // let std = JSON.parse(this.responseText);
    //                 if (this.responseText === "Success") {
    //                     // alert("Assignment added");
    //                     document.getElementById('assMsg').innerHTML = "Assignment added successfully";
    //                     // location.reload();
    //                     return true;
    //                 } else {
    //                     // alert("Error adding Assignment: duplicate assignment title");
    //                     document.getElementById('assMsg').innerHTML = "Error adding Assignment: duplicate assignment title";
    //                 }
    //             } else {
    //                 alert("Error: " + this.status);
    //             }
    //         }
    //     };
    //     xhttp.send('std=' + data);
    //     return false;
    // }
    return flag;
}

