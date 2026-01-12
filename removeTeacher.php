<?php
// Show all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB connection
include "config.php";

// Only run when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $teacherName = $_POST['teacher_name'];

    // Debug print
    echo "Received: $teacherName <br>";

    // Check if teacher exists
    $checkQuery = "SELECT * FROM teacherlogin WHERE name = '$teacherName'";
    $result = $con->query($checkQuery);

    if ($result->num_rows > 0) {
        // Teacher found, proceed with DELETE
        $sql = "DELETE FROM teacherlogin WHERE name = '$teacherName'";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Teacher removed successfully!'); window.location.href='teacher_option.html';</script>";
        } else {
            echo "❌ MySQL Error: " . $con->error;
        }
    } else {
        // Teacher not found
        echo "<script>alert('❌ Teacher not found!'); window.history.back();</script>";
    }

    $con->close();
} else {
    echo "⚠️ Form was not submitted correctly.";
}
?>
