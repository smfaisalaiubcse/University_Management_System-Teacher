function validateAssForm(pform) {
    let flag = true;
    console.log("form submitted");
    //academic information
    const assignment_title = pform.assignment_title.value;
    const due_date = pform.due_date.value;
    const assignment_marks = pform.assignment_marks.value;
    // const course_id = pform.course_id.value;
    const course_id = document.getElementById('course_id').value;

    const assignment_titleErr = document.getElementById('assignment_titleErr');
    const due_dateErr = document.getElementById('due_dateErr');
    const assignment_marksErr = document.getElementById('assignment_marksErr');

    assignment_titleErr.innerHTML = "";
    due_dateErr.innerHTML = "";
    assignment_marksErr.innerHTML = "";

    //academic 
    //ssc
    if (assignment_title === "") {
        assignment_titleErr.innerHTML = 'Please enter a assignment_title.';
        assignment_titleErr.style.color = "orange";
        flag = false;
    }
    if (due_date === "") {
        due_dateErr.innerHTML = 'Please enter a due_date.';
        due_dateErr.style.color = "orange";
        flag = false;
    }
    if (assignment_marks === "" || assignment_marks <= 0) {
        assignment_marksErr.innerHTML = 'Please enter a valid assignment_marks.';
        assignment_marksErr.style.color = "orange";
        flag = false;
    }
    if(flag) {
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../controller/assign_assignment_action.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        let std = {
            'assignment_title': assignment_title,
            'due_date': due_date,
            'course_id': course_id,
            'assignment_marks': assignment_marks
        }
        let data = JSON.stringify(std);
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    if (this.responseText === "Success") {
                        let assMsg = document.getElementById('assMsg');
                        assMsg.innerHTML = "Assignment added successfully tap on reload button to view changes.";
                        assMsg.style.color = "green";
                        // location.reload();
                        return true;
                    } else {
                        let assMsg = document.getElementById('assMsg');
                        assMsg.innerHTML = "Error adding assignment: duplicate assignment title!.";
                        assMsg.style.color = "red";
                    }
                } else {
                    alert("Error: " + this.status);
                }
            }
        };
        xhttp.send('std=' + data);
        return false;
    }
    return flag;
}

function fetchAss(courseID) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("data").innerHTML = xhttp.responseText;
    }

    // Append the courseID as a parameter to the URL
    const url = `../controller/view_assigned_assignments.php?format=json&courseID=${courseID}`;

    xhttp.open("GET", url);
    xhttp.send();
}
