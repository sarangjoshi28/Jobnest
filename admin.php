<?php
include "config.php"; 

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM adminlogin WHERE email = '$username' AND password = '$password'";
$result = $con->query($sql);

if ($result->num_rows == 1) {
    echo "<script>alert(' Login successfully!'); window.location.href='admin_home.html';</script>";
} else {
    echo "<script>alert(' unsuccessfully!'); window.location.href='admin_login.html';</script>";
}

$con->close();
?>
