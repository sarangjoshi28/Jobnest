<?php
include "config.php";

$prn = $_POST['prn'];
$name = $_POST['name'];
$pass = $_POST['pass'];

$sql = "INSERT INTO studentLogin (PRN, name, password) VALUES ('$prn', '$name', '$pass')";

if ($con->query($sql) === TRUE) {
  echo "<script>alert('✅ Student added successfully!'); window.location.href='student_option.html';</script>";
} else {
  echo "<script>alert('❌ Error: " . $con->error . "'); window.history.back();</script>";
}

$con->close();
?>
