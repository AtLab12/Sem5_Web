<html>
<head>
    <title>PHP Test</title>
</head>
<body>
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DBName";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM USER";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
        }
    } else {
        echo "0 results";
    }}
    else {
        $sql = "SELECT * FROM USER WHERE name = '{$_POST['username']}'";
        $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
        }
    } else {
        echo "0 results";
    }}
    
    $conn->close();

?>
<p> filter
<form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
    <input type="text" name="username">
    <input type="submit" value="Filter">
</form>
</body>
</html>