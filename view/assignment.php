<div class="assignment-form">
    <span id="assMsg">
        <?php
        if (isset($_SESSION['msgAss']) && $_SESSION['msgAss'] != '') echo $_SESSION['msgAss'];
        ?>
    </span>
    <script src="js/assignment_validation.js"></script>
    <!-- <script src="js/addAssignment.js"></script> -->
    <h2>Assign Assignment</h2>
    <div class="assignment-form-child">
        <form action="../controller/assign_assignment_action.php" method="post" onsubmit="return validateAssForm(this)">
            <div>
                <label for="assignment_title">Assignment Title:</label>
                <input type="text" class="text-input-1" id="assignment_title" name="assignment_title" value="<?php echo isset($_SESSION['assignmentTitle']) ? $_SESSION['assignmentTitle'] : "" ?>">
                <span id="assignment_titleErr"></span>
            </div>
            <div>
                <label for="due_date">Due Date:</label>
                <input type="date" class="text-input-1" id="due_date" name="due_date" value="<?php echo isset($_SESSION['dueDate']) ? $_SESSION['dueDate'] : "" ?>">
                <span id="due_dateErr"></span>
            </div>
            <input type="hidden" name="course_id" id="course_id" value="<?php echo $courseID; ?>">
            <div>
                <label for="assignment_marks">Assignment Marks:</label>
                <input type="number" class="text-input-1" id="assignment_marks" name="assignment_marks" value="<?php echo isset($_SESSION['assignmentMarks']) ? $_SESSION['assignmentMarks'] : "" ?>">
                <span id="assignment_marksErr"></span>
            </div>
            <div>
                <input type="submit" class="button button1" value="Assign Assignment">
            </div>
        </form>
    </div>

    <div>
    <button class="button1" onclick="fetchAss('<?php echo $courseID; ?>');">View All Assigned Assignments/Relode</button>
        <p id="data"></p>        
    </div>
    <?php
    // include '../controller/view_assigned_assignments.php';
    ?>

</div>

<?php
unset($_SESSION['assignmentTitle']);
unset($_SESSION['dueDate']);
unset($_SESSION['assignmentMarks']);
unset($_SESSION['msgAss']);
?>