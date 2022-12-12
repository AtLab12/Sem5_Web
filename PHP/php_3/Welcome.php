<?php
session_start();
$servername = "localhost";
$locUsername = "root"; // sql server user name 
$locPassword = "password"; // sql server password 
$databasName = "DBName";
$_SESSION["dbName"] = $databasName;

$conn = new mysqli($servername, $locUsername, $locPassword, $databasName);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "CREATE DATABASE IF NOT EXISTS {$databasName};";

if (!mysqli_query($conn, $sql)) {
    echo "Error creating database: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS USER ( 
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
name VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL )";

if (!mysqli_query($conn, $sql)) {
    echo "Error creating user table: " . mysqli_error($conn);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome screen</title>
</head>
<body>
    <h1> Welcome. Please log in or sign up: </h1>
    <div>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required>
    </div>

    <div>
        <label for="password">Password:</label> <br>
        <input type="password" id="password" name="password" required>
    </div>
    <input type="submit" value="Sign in">
    <a href="SignUp.php"> Or sign up here</a>
</body>
</html>