<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$username = "root";
$password = "sarang@28";
$database = "user";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$raw_password = $_POST['pwd']; // Updated to match the form

$hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

$sql = $con->prepare("INSERT INTO `admin` (`name`, `email`, `password`) VALUES (?, ?, ?)");
if ($sql === false) {
    die("Prepare failed: " . $con->error);
}

$sql->bind_param("sss", $name, $email, $hashed_password);

if ($sql->execute()) {
    header("Location: home.html");
    exit();
} else {
    echo "Error: " . $sql->error;
}

$sql->close();
$con->close();
?>
