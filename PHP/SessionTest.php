<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    This is a site testing session.<br>

    Your background color is: 
    <?php
    if (isset($_SESSION["backColor"])) {
        echo $_SESSION["backColor"];
    }   else { 
        echo "background color has not bee set.";
    }
    ?>
    <br>
    <br>
    <br>
    <?php
    if (isset($_SESSION["isLoggedIn"])) {
        if ($_SESSION["isLoggedIn"]) {
            echo "User is logged in";
            echo session_id();
        }   else {
            echo "User is NOT logged in. No access to clasified information";
        }
    }
    ?>
</body>
</html>