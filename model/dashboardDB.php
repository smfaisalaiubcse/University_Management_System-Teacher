<?php
function getNotices($conn) {
    $startDate = date('Y-m-d');
    $endDate = date('Y-m-d', strtotime('-5 days'));

    $noticeSql = "SELECT notice_text, notice_date FROM notices WHERE notice_date BETWEEN '$endDate' AND '$startDate' ORDER BY notice_date DESC";
    $noticeResult = $conn->query($noticeSql);

    if ($noticeResult->num_rows > 0) {
        $notices = "<div class='notice-section'>";
        $notices .= "<h3>Notices[Last 5 days]:</h3>";
        $notices .= "<table class=\"content-table\">";
        $notices .= "<tr><th>Date</th><th>Notice</th></tr>";

        while ($noticeRow = $noticeResult->fetch_assoc()) {
            $noticeText = $noticeRow["notice_text"];
            $noticeDate = $noticeRow["notice_date"];

            $notices .= "<tr>";
            $notices .= "<td>$noticeDate</td>";
            $notices .= "<td>$noticeText</td>";
            $notices .= "</tr>";
        }

        $notices .= "</table>";
        $notices .= "</div>";
    } else {
        $notices = "<p>No notices found.</p>";
    }

    return $notices;
}

function getUserCourses($conn, $username) {
    $sql = "SELECT userID FROM teacher WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['userID'] = $row['userID'];
        $userID = $_SESSION['userID'];

        $sql = "SELECT course_id, course_name, section FROM courses WHERE userID = '$userID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $coursesHtml = "<div class='courses-section'>";
            $coursesHtml .= "<h3><b>Your courses:</b></h3>";

            while ($row = $result->fetch_assoc()) {
                $course_id = $row["course_id"];
                $coursesHtml .= "<a href=\"course_details.php?course_id=$course_id\">" . $row["course_name"] . "[" . $row["section"] . "]</a><br><br>";
            }

            $coursesHtml .= "</div>";
        } else {
            $coursesHtml = "No courses found.";
        }

        return $coursesHtml;
    } else {
        return "Error fetching user information.";
    }
}
?>
