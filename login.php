<?php 
    session_start();
    include 'config.php';

    $prn=$_POST['prn'];
    $password=$_POST['password'];

    $sql="select * from studentlogin where PRN=? and password=?";
    $statement=$con->prepare($sql);
    $statement->bind_param("ss",$prn,$password);
    $statement->execute();
    $result=$statement->get_result();

    if($result->num_rows==1)
    {
        $_SESSION['prn']=$prn;
        header("Location:student_home.html");
    }else
    echo "login not sucessful";
?>