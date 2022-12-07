<!DOCTYPE html>
<?php
$color = "#ffffff";
$cookie_name = "backgroundColor";
cookieAction();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["BackgroundColor"] !== "#000000") { // to avoid setting the default value
        setcookie($cookie_name, $_POST["BackgroundColor"], time() + 10); // change to 60 to comply with the task 
        $color = $_POST["BackgroundColor"];
    }
}

function cookieAction() {
    global $cookie_name, $color;
    if(isset($_COOKIE[$cookie_name])) {
        $color = (string) $_COOKIE[$cookie_name];
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style='background-color:<?php echo $color?>'>
<p>Choose your background color:</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="form" autocomplete="on">
    <div>
        <input type="color" name="BackgroundColor">
        <label for="backgroundColor">Select site background color</label>
    </div>
    <input type="submit" value="Wyślij">
</form>
</body>
</html>