<?php
include 'config.php'; 

$prn = $_POST['prn'];


$checkQuery = "SELECT * FROM studentLogin WHERE PRN = ?";
$stmt = $con->prepare($checkQuery);
$stmt->bind_param("s", $prn);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $con->query("DELETE FROM skills WHERE PRN='$prn'");
    $con->query("DELETE FROM projects WHERE PRN='$prn'");
    $con->query("DELETE FROM placed WHERE PRN='$prn'");
    $con->query("DELETE FROM applications WHERE PRN='$prn'");
    $con->query("DELETE FROM studentinfo WHERE PRN='$prn'");
    $con->query("DELETE FROM studentlogin WHERE PRN='$prn'");

    echo "<script>alert('Student removed successfully.'); window.location.href='student_option.html';</script>";
} else {
    echo "<script>alert('PRN not found!'); window.location.href='removeStudent.html';</script>";
}

$con->close();
?>
