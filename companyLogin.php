<?php 
    session_start();
    include 'config.php';
    if(strpos($_POST['email'],'@')&&strpos($_POST['email'],'.'))
    {
        $email=$_POST['email'];
    }else
     echo "invalid email id";

    $password=$_POST['password'];

    $sql="select * from companyLogin where email=? and password=? ";
    $statement=$con->prepare($sql);
    $statement->bind_param("ss",$email,$password);
    $statement->execute();
    $result=$statement->get_result();

    if($result->num_rows==1)
    {
        $row=$result->fetch_assoc();
        $_SESSION['companyID']=$row['companyID'];
        $_SESSION['name']=$row['name'];
        


        header("Location:comp.html");
    }else
    echo "login not sucessful";
?>