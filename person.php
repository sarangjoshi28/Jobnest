<?php
    $server="localhost";
    $username="root";
    $password="sarang@28";
    $database="job";

    $con=mysqli_connect($server,$username,$password,$database);
    if(!$con){
        die("connection failed".mysqli_connect_error());
    }
    echo "succesful";
   $name =$_POST['name'];
   $id=$_POST['id'];
   $address=$_POST['address'];
   $date=$_POST['date'];
    $sql="INSERT INTO `person` (`name`,`id`,`address`,`date`) VALUES('$name','$id','$address','$date');";
    if($con->query($sql)==true)
    {
        echo "successful";
    }
    else{
        echo "not successful";
    }
    $con->close();
?>
<form action="person.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="id">ID:</label>
    <input type="text" id="id" name="id" required><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required><br>

    <label for="sdate">Date:</label>
    <input type="date" id="date" name="date" required><br>

    <input type="submit" value="Submit">
</form>
