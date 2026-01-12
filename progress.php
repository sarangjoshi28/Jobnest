<?php 
session_start();
include 'config.php';

$PRN = $_SESSION['prn'];

$sql = "SELECT applications.applicationID, companyLogin.name AS companyName, postJobs.jobId, applications.status 
        FROM applications 
        INNER JOIN postJobs ON applications.jobId = postJobs.jobId
        INNER JOIN companyLogin ON postJobs.companyID = companyLogin.companyID
        WHERE applications.PRN = ?";

$statement = $con->prepare($sql);
$statement->bind_param("s", $PRN);
$statement->execute();
$result = $statement->get_result();

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Application Status</title>
    <link rel='stylesheet' href='progress.css'>
</head>
<body>
<div class='container'>
    <h2>Your Application Status</h2>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='status-card'>
                <p><strong>Application ID:</strong> {$row['applicationID']}</p>
                <p><strong>Company Name:</strong> {$row['companyName']}</p>
                <p><strong>Job ID:</strong> {$row['jobId']}</p>
                <p><strong>Status:</strong> {$row['status']}</p>
              </div>";
    }
} else {
    echo "<p class='no-data'>You have not applied for any jobs yet.</p>";
}

echo "</div>
</body>
</html>";
?>
