<?php
include 'config.php';

$sql = "SELECT 
            a.applicationID, 
            s.PRN, 
            s.name, 
            si.passoutYear, 
            c.name AS companyName
        FROM studentLogin s
        JOIN studentInfo si ON s.PRN = si.PRN
        JOIN applications a ON s.PRN = a.PRN
        JOIN postJobs j ON a.jobId = j.jobId
        JOIN companyLogin c ON j.companyID = c.companyID
        WHERE a.status = 'selected'";

$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selected Students</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #e0f7fa, #f1f8ff);
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #0d47a1;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 14px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #0d47a1;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            tr {
                margin-bottom: 20px;
            }

            th {
                display: none;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 45%;
                text-align: left;
                font-weight: bold;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Selected Students List</h2>
    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Application ID</th>
                    <th>PRN</th>
                    <th>Name</th>
                    <th>Passout Year</th>
                    <th>Company Name</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td data-label="Application ID"><?= $row['applicationID'] ?></td>
                        <td data-label="PRN"><?= $row['PRN'] ?></td>
                        <td data-label="Name"><?= $row['name'] ?></td>
                        <td data-label="Passout Year"><?= $row['passoutYear'] ?></td>
                        <td data-label="Company Name"><?= $row['companyName'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align:center; font-size: 18px; color: #c62828;">No selected students found.</p>
    <?php endif; ?>
</div>

</body>
</html>
