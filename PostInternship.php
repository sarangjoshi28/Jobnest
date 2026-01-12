<?php
include "config.php"; 
$name = $_POST['name'];
$company = $_POST['company'];
$duration = $_POST['duration'];
$stipend = $_POST['stipend'];

$sql = "INSERT INTO postinternship(name, companyName, duration, stipend)
        VALUES ('$name', '$company', '$duration', '$stipend')";

if ($con->query($sql) === TRUE) {
    echo "<script>alert('✅ Student added successfully!'); window.location.href='post_intrenship.html';</script>";
  } else {
    echo "<script>alert('❌ Error: " . $con->error . "'); window.history.back();</script>";
  }

$con->close();
?>
