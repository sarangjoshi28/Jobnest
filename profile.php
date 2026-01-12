<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    <style>
        body {
            background: linear-gradient(to right, #dbeafe, #e0f7fa);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .profile-container {
            width: 90%;
            max-width: 600px;
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            text-align: center;
            animation: slideUp 0.6s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-container h1 {
            color: #0d47a1;
            margin-bottom: 30px;
            font-size: 32px;
        }

        .profile-detail {
            color: #333;
            font-size: 20px;
            margin: 14px 0;
        }

        .button-group {
            margin-top: 35px;
        }

        .profile-button {
            padding: 12px 30px;
            background-color: #0d47a1;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .profile-button:hover {
            background-color: #08306b;
            transform: scale(1.05);
        }

        .no-profile {
            background-color: #fff3f3;
            padding: 30px;
            border: 1px solid #ffcdd2;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        .no-profile h2 {
            color: #c62828;
        }

        @media (max-width: 480px) {
            .profile-container h1 {
                font-size: 26px;
            }

            .profile-detail {
                font-size: 18px;
            }

            .profile-button {
                padding: 10px 20px;
                font-size: 16px;
                margin: 8px 5px;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<?php 
    session_start();
    include 'config.php';

    $PRN = $_SESSION['prn'];
    $sql = "SELECT PRN, name FROM studentLogin WHERE PRN = ?";
    $statement = $con->prepare($sql);
    $statement->bind_param("s", $PRN);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        echo '
            <div class="profile-container">
                <h1>Your Profile</h1>
                <div class="profile-detail"><strong>PRN:</strong> ' . $student['PRN'] . '</div>
                <div class="profile-detail"><strong>Name:</strong> ' . $student['name'] . '</div>
                <div class="button-group">
                    <a href="student_form.html" class="profile-button">Edit </a>
                    <a href="student_home.html" class="profile-button">Back</a>
                </div>
            </div>
        ';
    } else {
        echo '
            <div class="no-profile">
                <h2>No profile found.</h2>
            </div>
        ';
    }
?>

</body>
</html>
