<?php
include "config.php"; 

$username = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM teacherlogin WHERE email = '$username' AND password = '$password'";
$result = $con->query($sql);

if ($result->num_rows == 1) {
    echo "<script>alert('✅ Login successfully!'); window.location.href='teacher_home.html';</script>";
} else {
    echo "<script>alert('❌ Error: " . $con->error . "'); window.history.back();</script>";
}

$con->close();
?>
