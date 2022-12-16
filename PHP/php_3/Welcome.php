<?php
session_start();
$servername = "127.0.0.1";
$locUsername = "root"; // sql server user name 
$locPassword = ""; // sql server password 
$databasName = "DBName";
$_SESSION["dbName"] = $databasName;

$conn = new mysqli($servername, $locUsername, $locPassword, $databasName, 3306);

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

if(!empty($_POST["signin"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT username FROM USER WHERE username='{$username}' AND password='{$password}'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0) {
        $_SESSION["username"] = $result->fetch_assoc()["username"];
        echo "Log in sucessfull";
    }   else {
        echo "Incorrect email or password";
    }
}

if(isset($_SESSION['username'])){
    header("Location:Confidential.php");
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="form" autocomplete="on">
    <h1> Welcome. Please log in or sign up: </h1>
    <div>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required>
    </div>

    <div>
        <label for="password">Password:</label> <br>
        <input type="password" id="password" name="password" required>
    </div>
    <input type="submit" name="signin" value="Sign in">
</from>
    <a href="SignUp.php"> Or sign up here</a>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
$query = "SELECT * FROM USER";
echo quotemeta("<b> <center>Database Output</center> </b> <br> <br>");

if ($result = mysqli_query($conn, $query)) {
    while ($row = $result->fetch_assoc()) {
        $field0name = $row["id"];
        $field1name = $row["username"];
        $field2name = $row["password"];
        $field3name = $row["name"];
        $field4name = $row["email"];

        echo "{$field0name} {$field1name}, {$field2name}, {$field3name}, {$field4name}".'<br />';
    }
} else {
    echo "No data";
}
?>
</body>
</html>