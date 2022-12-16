<?php
session_start();

$conn = new mysqli("localhost", "root", "", "DBName", 3306);
global $loggedin;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $conn;
    $loggedin = false;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $sql = "SELECT username FROM USER WHERE username='{$username}'";
    if(mysqli_query($conn, $sql)->num_rows > 0) {
        $sql = "UPDATE USER SET password='$password', name='$name', email='$email' WHERE username='$username'";
        mysqli_query($conn, $sql);

    } else 
    {
        $sql = "INSERT INTO USER (username, password, name, email)
    VALUES ('{$username}', '{$password}', '{$name}', '{$email}')";
    }
    if (!mysqli_query($conn, $sql)) {
        echo "Error creating user table: " . mysqli_error($conn);
    }
} else {
    if(isset($_SESSION['username']))
    {
        
        $loggedin = true;
        global $result ;
        $result = mysqli_query($conn, "SELECT * FROM USER WHERE username = '{$_SESSION['username']}'")->fetch_assoc();
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
        <input type="text" id="username" name="username" required <?php if($loggedin) echo "value=".$result["username"];?> >
    </div>

    <div>
        <label for="password">Set password:</label> <br>
        <input type="password" id="password" name="password" required <?php if($loggedin) echo "value=".$result["password"];?> >
    </div>

    <div>
        <label for="name">Set your name:</label> <br>
        <input type="name" id="name" name="name" required <?php if($loggedin) echo "value=".$result["name"];?> >
    </div>

    <div>
        <label for="email">Set your email:</label> <br>
        <input type="email" id="email" name="email" required <?php if($loggedin) echo "value=".$result["email"];?> >
    </div>
    <input type="submit" value=<?php if($loggedin) echo "Update"; else echo "Sign up";?>>
<br>
<br>
<a href="Welcome.php">Go back to home screen</a>
</form>
</body>
</html>