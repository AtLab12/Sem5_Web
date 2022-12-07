<?php
session_start();
$sessionID = "";
setcookie(session_id(), $sessionID, time() + 8600);
$_SESSION["isLoggedIn"] = false;
$color = "#ffffff";
$cookie_name = "backgroundColor";
cookieAction();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["BackgroundColor"] !== "#000000") { // to avoid setting the default value
        setcookie($cookie_name, $_POST["BackgroundColor"], time() + 10); // change to 60 to comply with the task 
        $color = $_POST["BackgroundColor"];
        $_SESSION["backColor"] = $_POST["BackgroundColor"];
    }
    if(array_key_exists('login', $_POST)) {
        loginUser();
    }
}

function cookieAction() {
    global $cookie_name, $color;
    if(isset($_COOKIE[$cookie_name])) {
        $color = (string) $_COOKIE[$cookie_name];
    }   
}

function loginUser() {
    $_SESSION["isLoggedIn"] = true;
}
?>
<!DOCTYPE html>
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
    <input type="submit" name="Submit" value="Wyślij"><br>
    <input type="submit" name="login" value="Login">
    <a href="SessionTest.php">Go to user only page</a>
</form>
</body>
</html>
<?php
/*

1.client application makes a request
2.server side returns with a Set-Cookie response header
3.client makes another request, putting the cookie returned in step 2 in to the HTTP request "Cookie" header
4.server side returns but with no Set-Cookie in the response header

Jeśli serwer uzywa cookies to zwraca je w Set-Cookie:name=value.

Jeśli klient wysyła to w Set-Cookie:name=value.

setcookie() defines a cookie to be sent along with the rest of the HTTP headers.
Like other headers, cookies must be sent before any output from your script (this is a protocol restriction).
This requires that you place calls to this function prior to any output, including < html> and < head> tags as well as any whitespace.

Alternatywą dla ciasteczek jest local storage. Z perspektywy zapisywania danych daje nam praktycznie taki sam efekt, 
ale inne jest API dostępu. 


session_start() creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.

When session_start() is called or when a session auto starts, PHP will call the open and read session save handlers. These will either be a built-in save handler provided by default or by PHP extensions
(such as SQLite or Memcached); or can be custom handler as defined by session_set_save_handler(). The read callback will retrieve any existing session data (stored in a special serialized format) and will
be unserialized and used to automatically populate the $_SESSION superglobal when the read callback returns the saved session data back to PHP session handling.
*/
?>