function validateUpMrk(form) {
    // Check if the form is submitted with the "Update" button
    var isUpdateClicked = false;
    var studentID = null;
    var isResetClicked = false;
    // Loop through all buttons to find the clicked one
    var buttons = form.querySelectorAll('button[name^="update"]');
    buttons.forEach(function(button) {
        if (button === document.activeElement) {
            isUpdateClicked = true;
            studentID = button.value;
        }
    });

    var buttons = form.querySelectorAll('button[name^="reset"]');
    buttons.forEach(function(button) {
        if (button === document.activeElement) {
            isResetClicked = true;
            studentID = button.value;
        }
    });

    if (isUpdateClicked && studentID !== null) {
        // Validation for Midterm Marks
        var midMarksInput = form.querySelector('input[name="midterm_marks[' + studentID + ']"]');
        var midMarksValue = midMarksInput.value.trim();

        // Check if the input is empty or not a valid number
        if (midMarksValue === '' || isNaN(midMarksValue)) {
            document.getElementById('midterm_marksErr').innerHTML = 'Midterm marks must be a valid number for student id: ' + studentID;
            midMarksInput.classList.add('error');
            return false;
        } else {
            document.getElementById('midterm_marksErr').innerHTML = '';
            midMarksInput.classList.remove('error');
        }

        // Add similar validation for other fields if needed
    }

    if (isResetClicked && studentID !== null) {
        // Validation for Midterm Marks
        var midMarksInput = form.querySelector('input[name="midterm_marks[' + studentID + ']"]');
        var midMarksValue = midMarksInput.value.trim();

        // Check if the input is empty or not a valid number
        if (midMarksValue === '-' || isNaN(midMarksValue)) {
            document.getElementById('midterm_marksErr').innerHTML = 'Marks already in reset condition for student id: ' + studentID;
            midMarksInput.classList.add('error');
            return false;
        } else {
            document.getElementById('midterm_marksErr').innerHTML = '';
            midMarksInput.classList.remove('error');
        }

        // Add similar validation for other fields if needed
    }

    // If it's not an "Update" click, no need to validate
    return true;
}