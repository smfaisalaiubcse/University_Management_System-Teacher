function fetchEnrolledStudents(courseID) {
    console.log("i am here");

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("students").innerHTML = xhttp.responseText;
    }

    // Append the courseID as a parameter to the URL
    const url = `../controller/studentcourseEnrollment_action.php?format=json&course_id=${courseID}`;

    xhttp.open("GET", url);
    xhttp.send();
}