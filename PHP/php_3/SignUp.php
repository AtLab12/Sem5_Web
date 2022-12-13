<?php
session_start();

$conn = new mysqli("localhost", "root", "12345678", "DBName", 8000);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $conn;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $sql = "INSERT INTO USER (username, password, name, email)
    VALUES ('{$username}', '{$password}', '{$name}', '{$email}')";

    if (!mysqli_query($conn, $sql)) {
        echo "Error creating user table: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="form" autocomplete="on">
    <div>
        <label for="username">Set username:</label><br>
        <input type="text" id="username" name="username" required>
    </div>

    <div>
        <label for="password">Set password:</label> <br>
        <input type="password" id="password" name="password" required>
    </div>

    <div>
        <label for="name">Set your name:</label> <br>
        <input type="name" id="name" name="name" required>
    </div>

    <div>
        <label for="email">Set your email:</label> <br>
        <input type="email" id="email" name="email" required>
    </div>
    <input type="submit" value="Register">
<br>
<br>
<a href="Welcome.php">Go back to home screen</a>
</form>
</body>
</html>