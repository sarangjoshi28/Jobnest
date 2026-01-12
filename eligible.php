<?php 
session_start();
include 'config.php';

// Get company details from session
$companyID = $_SESSION['companyID'];
$name = $_SESSION['name'];

// Get all students who applied for jobs posted by this company
$sql = "SELECT 
            studentLogin.name AS studentName, 
            studentLogin.PRN, 
            postJobs.jobId, 
            postJobs.companyName, 
            applications.status, 
            applications.applicationID 
        FROM applications 
        INNER JOIN postJobs ON applications.jobId = postJobs.jobId 
        INNER JOIN studentLogin ON applications.PRN = studentLogin.PRN 
        WHERE postJobs.companyID = ?";

$statement = $con->prepare($sql);
$statement->bind_param("s", $companyID);
$statement->execute();
$result = $statement->get_result();

// Start of HTML
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Eligible Students</title>
    <link rel='stylesheet' href='eligible.css'>
</head>
<body>
    <div class='container'>
        <h2>Eligible Students Who Applied</h2>";

if ($result->num_rows > 0) {
    echo "<table class='applications-table'>
            <tr>
                <th>Student Name</th>
                <th>PRN</th>
                <th>Job ID</th>
                <th>Company Name</th>
                <th>Status</th>
                <th>Update Status</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['studentName']}</td>
                <td>{$row['PRN']}</td>
                <td>{$row['jobId']}</td>
                <td>{$row['companyName']}</td>
                <td>{$row['status']}</td>
                <td>
                    <form method='POST' action='update_status.php'>
                        <input type='hidden' name='applicationID' value='{$row['applicationID']}'>
                        <select name='status'>
                            <option value='applied' " . ($row['status'] === 'applied' ? 'selected' : '') . ">Applied</option>
                            <option value='selected' " . ($row['status'] === 'selected' ? 'selected' : '') . ">Selected</option>
                            <option value='rejected' " . ($row['status'] === 'rejected' ? 'selected' : '') . ">Rejected</option>
                        </select>
                        <input type='submit' value='Update'>
                    </form>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No applications found for your jobs yet.</p>";
}

echo "</div>
</body>
</html>";
?>
