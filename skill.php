<?php 
    session_start();
    include 'config.php';

    if(!isset($_SESSION['prn']))
    {
        header("Location:login.html");
        exit();
    }

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $PRN=$_SESSION['prn'];
        $skill=$_POST['skill'];
    }
    $sql="insert into skills (PRN,skill) values(?,?)";
    $statement=$con->prepare($sql);
    if($statement->execute())
    {
        echo "skill added";
        heading("Location: skill.html");
    }else 
    echo "not added";
?>