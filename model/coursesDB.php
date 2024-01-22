<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "university_management_system";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];

$sql = "SELECT userID FROM teacher WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($userID);
$stmt->fetch();
$stmt->close();

$_SESSION['userID'] = $userID;

$sql = "SELECT course_id, course_name, section, course_code, department FROM courses WHERE userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['userID']);
$stmt->execute();
$result = $stmt->get_result();

$courses = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $course_id = $row["course_id"];
        $courses[] = [
            'id' => $course_id,
            'name' => $row["course_name"],
            'section' => $row["section"],
            'code' => $row["course_code"],
            'department' => $row["department"],
        ];
    }
}

$stmt->close();
$conn->close();
?>
