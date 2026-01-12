<?php
header("Content-Type: application/json");
include "config.php";

$sql = "SELECT * FROM postInternship ORDER BY internshipId DESC LIMIT 4";
$result = $con->query($sql);

$internships = [];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $internships[] = $row;
    }
}

echo json_encode($internships);
$con->close();
?>
