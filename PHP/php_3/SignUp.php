<?php
session_start();
if (isset($_SESSION["dbName"])) {
    echo $_SESSION["dbName"];
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
    Register screen
</body>
</html>