<?php
include "config.php";  

$companyName = $_POST['name'];

if (!preg_match("/^[A-Za-z\s]+$/", $companyName)) {
    echo "<script>alert('❌ Company name should only contain alphabets and spaces.'); window.history.back();</script>";
    exit();  
}

$checkCompanySql = "SELECT * FROM companyLogin WHERE name = '$companyName'";
$result = $con->query($checkCompanySql);

if ($result->num_rows == 0) {
    echo "<script>alert('❌ Company name does not match any record. Please check the name and try again.'); window.history.back();</script>";
    exit();  
}

$deleteSql = "DELETE FROM companyLogin WHERE name = '$companyName'";

if ($con->query($deleteSql) === TRUE) {
    echo "<script>alert('✅ Company removed successfully!'); window.location.href='company_option.html';</script>";
} else {
    echo "<script>alert('❌ Error: " . $con->error . "'); window.history.back();</script>";
}

$con->close(); 
?>
