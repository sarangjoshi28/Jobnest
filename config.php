<?php 
    $host='localhost';
    $user='root';
    $password='sarang@28';
    $database='jobnest';

    $con= new mysqli($host,$user,$password,$database);

    if($con->connect_error)
    {
        die("connection failed".$con->connect_error);
    }
?>
