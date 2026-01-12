<?php 
    session_start();
    include 'config.php';
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $jobID=$_POST['jobID'];
        $companyID=$_SESSION['companyID'];
        $companyName=$_SESSION['name'];
        if($_POST['tenth']>100 || $_POST['tenth']<0)
        {
            echo "invalid marks";
        }else
        $tenth=$_POST['tenth'];
        if(isset($_POST['twelth']) || $_POST['twelth']!="")
        {
        if($_POST['twelth']>100 || $_POST['twelth']<0)
        {
            echo "invalid marks";
        }else
        $twelth=$_POST['twelth'];
    }else
        {
            $twelth=0;
        }

        if(isset($_POST['diploma']) || $_POST['diploma']!="")
        {
        if($_POST['diploma']>100 || $_POST['diploma']<0)
        {
            echo "invalid marks";
        }else
        $diploma=$_POST['diploma'];
    }else{
        $diploma=0;
    }

    if($_POST['cgpa']>10 || $_POST['cgpa']<0)
    {
        echo "invalid marks";
    }else
    $cgpa=$_POST['cgpa'];

    $salary=$_POST['salary'];
    }

    $sql="insert into postJobs(jobID,companyID,companyName,tenth,twelth,diploma,cgpa,salary) values(?,?,?,?,?,?,?,?)" ;
    $statement=$con->prepare($sql);
    $statement->bind_param("sssddddd",$jobID,$companyID,$companyName,$tenth,$twelth,$diploma,$cgpa,$salary);
    if($statement->execute())
    {
        echo "<script>
        alert('Application submitted sucessfully');
        window.location.href = 'comp.html';
        </script>";
    }
    else
    echo "unsucessful";
?>