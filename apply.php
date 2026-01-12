<?php 
    session_start();
    include 'config.php';
    $PRN=$_SESSION['prn'];
    $jobID=$_POST['jobId'];
    $sql1="select * from studentInfo where PRN=?";
    $statement1=$con->prepare($sql1);
    $statement1->bind_param("s",$PRN);
    $statement1->execute();
    $result1=$statement1->get_result();
    if($result1->num_rows==1)
    {
        $student=$result1->fetch_assoc();
        $tenth=$student['tenth'];
        $twelth=$student['twelth'];
        $diploma=$student['diploma'];
        $cgpa=$student['cgpa'];
    }

    $sql2="select * from postJobs where jobId=?";
    $statement2=$con->prepare($sql2);
    $statement2->bind_param("s",$jobID);
    $statement2->execute();
    $result2=$statement2->get_result();
    if($result2->num_rows==1)
    {
        $criteria=$result2->fetch_assoc();
        $c_tenth=$criteria['tenth'];
        $c_twelth=$criteria['twelth'];
        $c_diploma=$criteria['diploma'];
        $c_cgpa=$criteria['cgpa'];
    }

    if($tenth<$c_tenth)
    {
        echo "10th % not matches"; 
        exit();
    }
    if($twelth<$c_twelth && $diploma<$c_diploma)
    {
        
        echo "<script>alert('12/dip % not matches');</script>"; 
        
        exit();
    }
    if($cgpa<$c_cgpa)
    {
        echo "cgpa  not matches"; 
        exit();
    }
    $sqlCheck = "SELECT * FROM applications WHERE PRN=? AND jobId=?";
    $checkStmt = $con->prepare($sqlCheck);
    $checkStmt->bind_param("ss", $PRN, $jobID);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        echo "<script>
            alert('You have already applied for this job.');
            window.location.href = 'application.php';
        </script>";
        exit();
    }

    $sql3="insert into applications (PRN,jobId) values(?,?)";
    $statement3=$con->prepare($sql3);
    $statement3->bind_param("ss",$PRN,$jobID);
    if($statement3->execute())
    {
        echo "<script>
        alert('Application submitted sucessfully');
        window.location.href = 'application.php';
        </script>";
    }else
    echo "<script>
    alert('Application failed. Please try again later.');
    window.location.href = 'application.php';
    </script>";



?>