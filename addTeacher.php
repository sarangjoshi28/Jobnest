<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacherID = $_POST['teacher_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "Received: $teacherID, $name, $email, $password <br>";

    $sql = "INSERT INTO teacherlogin (teacherID, name, email, password) 
            VALUES ('$teacherID', '$name', '$email', '$password')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Teacher added successfully!'); window.location.href='teacher_option.html';</script>";
    } else {
        echo "❌ MySQL Error: " . $con->error;
    }

    $con->close();
} else {
    echo "⚠️ Form was not submitted correctly.";
}
?>
