<?php
session_start();
$username = "user";

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

if(!empty($_POST["signOut"])) {
    unset($_SESSION['username']);
}

if(!isset($_SESSION['username'])){
    header("Location:Welcome.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confidential</title>
</head>
<body>
    <h1>Hello <?php echo $username?></h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="form" autocomplete="on">
    <input type="submit" name="signOut" value="Sign out">
    </from>
</body>
</html>