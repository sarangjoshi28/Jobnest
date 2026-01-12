<?php
include "config.php"; 

$companyID = $_POST['cid'];
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$sql = "INSERT INTO companyLogin (companyID, name, email, password) 
        VALUES ('$companyID', '$name', '$email', '$pass')";

if ($con->query($sql) === TRUE) {
  echo "<script>alert('✅ Company added successfully!'); window.location.href='company_option.html';</script>";
} else {
  echo "<script>alert('❌ Error: " . $con->error . "'); window.history.back();</script>";
}

$con->close();
?>
