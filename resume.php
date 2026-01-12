<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        .resume-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 40px;
            background-color: white;
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            border-radius: 12px;
        }

        .resume-header {
            text-align: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .resume-header h1 {
            margin: 0;
            color: #007bff;
            font-size: 32px;
        }

        .resume-header h2 {
            margin: 10px 0 0;
            color: #333;
            font-size: 20px;
        }

        .resume-section {
            margin-bottom: 25px;
        }

        .resume-section h3 {
            color: #007bff;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        .resume-section p {
            margin: 5px 0;
            color: #444;
        }

        .edit-button {
            display: block;
            width: fit-content;
            margin: 30px auto 0;
            padding: 10px 25px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .edit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php 
    session_start();
    include 'config.php';

    $PRN = $_SESSION['prn'];

    $sql = "SELECT * FROM studentInfo 
            INNER JOIN studentLogin ON studentInfo.PRN = studentLogin.PRN 
            WHERE studentInfo.PRN = ?";
    $statement = $con->prepare($sql);
    $statement->bind_param("s", $PRN);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        echo '
        <div class="resume-container">
            <div class="resume-header">
                <h1>' . $student['name'] . '</h1>
                <h2>PRN: ' . $student['PRN'] . '</h2>
            </div>

            <div class="resume-section">
                <h3>Contact Information</h3>
                <p><strong>Email:</strong> ' . $student['email'] . '</p>
                <p><strong>Mobile No:</strong> ' . $student['mobNo'] . '</p>
                <p><strong>Address:</strong> ' . $student['Address'] . '</p>
            </div>

            <div class="resume-section">
                <h3>Education</h3>
                <p><strong>10th Percentage:</strong> ' . $student['tenth'] . '%</p>
                <p><strong>12th Percentage:</strong> ' . $student['twelth'] . '%</p>
                <p><strong>Diploma Percentage:</strong> ' . $student['diploma'] . '%</p>
                <p><strong>College Name:</strong> ' . $student['collegeName'] . '</p>
                <p><strong>Branch:</strong> ' . $student['branch'] . '</p>
                <p><strong>CGPA:</strong> ' . $student['cgpa'] . '</p>
            </div>

            
        </div>';
    }
?>
</body>
</html>
