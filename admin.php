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

$email = $_POST['email'];
$raw_password = $_POST['password'];

$sql = $con->prepare("SELECT `password` FROM `admin` WHERE `email` = ?");
if ($sql === false) {
    die("Prepare failed: " . $con->error);
}

$sql->bind_param("s", $email);
$sql->execute();
$sql->store_result();

if ($sql->num_rows > 0) {
    $sql->bind_result($hashed_password);
    $sql->fetch();
    if (password_verify($raw_password, $hashed_password)) {
        header("Location: home.html");
        exit();
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Invalid email or password.";
}

$sql->close();
$con->close();
?>
