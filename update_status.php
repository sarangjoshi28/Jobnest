<?php 
    session_start();
    include 'config.php';
    $appId=$_POST['applicationID'];
    $status=$_POST['status'];
    $sql="update applications set status=? where applicationID=?";
    $statement=$con->prepare($sql);
    $statement->bind_param("ss",$status,$appId);
    if($statement->execute())
    {
        echo "<script>
        alert('status updated ');
        window.location.href = 'eligible.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('status  not updated ');
        window.location.href = 'eligible.php';
        </script>";
    }
    

?>