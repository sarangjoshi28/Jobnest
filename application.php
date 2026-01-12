<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Jobs</title>
    <link rel="stylesheet" href="jobs.css">
</head>
<body>

<div class="job-container">
<?php
$sql = "SELECT * FROM postJobs";
$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div class='job-card'>";
    echo "<h2>" . $row['companyName'] . "</h2>";
    echo "<p>Job ID: " . $row['jobId'] . "</p>";
    echo "<p>Required CGPA: " . $row['cgpa'] . "</p>";
    echo "<p>Salary: ₹" . $row['salary'] . " LPA</p>";

    echo "<form method='POST' action='apply.php'>";
    echo "<input type='hidden' name='jobId' value='" . $row['jobId'] . "' />";
    echo "<input type='submit' value='Apply' />";
    echo "</form>";
    echo "</div>";
}
?>
</div>

</body>
</html>
