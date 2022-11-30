<?php
    namespace example;
    $emailPattern = "/^\S+@\S+$/";
    $nameError = $emailError = $ageMessage = $mathMessage = $tablesMessage = $nameMessage = $dogMessage = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["first_name"])) {
            $nameError = "Please provide name";
        }

        define("age", $_POST["age_name"]);
        $ageMessage = (string) age;
        settype($ageMessage, 'string');
    }

    function validateEmail($email) {
        global $emailError, $emailPattern;
        if (!preg_match($emailPattern, $email)) {
            $emailError = "Invalid email";
        }   else {
            $testText = "abcdefabc";
            $result = preg_replace('/abc/', "ijk", $testText);
            $emailError = "Regex replace test text {$testText} result is {$result}";
        }
    }
    validateEmail($_POST["email_name"]);

    function mathThings() {
        global $mathMessage;
        $age =  $_POST["age_name"];
        $fiveMore = $age + 5;
        $isOld = $age > 18;
        $mathLaws = $age + 2 * 5;
        $mathMessage = "Wiek o 5 większy to: {$age}. Czy jest stary: {$isOld}. Wynik kolejności operatorów: {$mathLaws}";

        for($i = 0; $i <= $age; $i++) {
            echo "Kiedyś miałeś {$i} lat.";
        }
    }
    if (!empty($_POST["age_name"])) {
        mathThings();
    }

    function tablesDemo() {
        global $tablesMessage;

        $cars = array("Volvo", "Daweoo", "Volkswagen");
        $totalCount = count($cars); 
        $current = current($cars);
        $next = next($cars);
        $afterReset = reset($cars);
        $first = $cars[0];

        echo "
        Car choices are:";
        foreach($cars as &$value) {
            echo "{$value}";
        }
        # if you know how. Fix the formating
        echo "
        Total count: {$totalCount}.
        Test reset:
        Current: {$current}
        Next: {$next}
        After reset: {$afterReset}
        ";

        $phones = array("iPhone"=>"awesome", "Samsung"=>"Ok", "Xiaomi"=>"Shit");
        $review = $phones['iPhone'];

        $tablesMessage = "iPhone is: {$review}. Best car brand is: {$first}";
    }
    tablesDemo();

    function chainThings() {
        global $nameMessage;

        $name = $_POST["first_name"];
        $compareName = "Andrzej";
        $firstResult = strcmp($name, $compareName) !== 0;
        $secondResult = ($name !== $compareName);

        $nameMessage = "Function comparison result (\$firstResult): {$firstResult}. Operator comparison result {$secondResult}.";
    }
    chainThings();

    function getDogName() {
        return "doggy";
    }
    ?>
<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="utf-8">
        <title>Formularz</title>
        <meta name="description" content="formularz php">
        <meta name="keywords" content="php formularz">
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="form" autocomplete="on">
            <fieldset>
                <?php echo $nameError;?><br>
                <?php echo $nameMessage?><br>
                <label for="fname">Imię</label>
                <input type="text" name="first_name" id="fname" autofocus><br>
                <label for="lname">Nazwisko</label>
                <input type="text" name="last_name" id="lname"><br>
                <label for="email">Email:</label>
                <input type="email" name="email_name" id="email" ><?php echo $emailError;?><br>
                <label for="age">Wiek</label>
                <input type="number" name="age_name" id="age"><br><?php echo $ageMessage?><br>
                <?php echo $mathMessage ?><br>
                <label for="country">Kraj</label>
                <select name="country" id="country">
                    <option value="pl">Polska</option>
                    <option value="de">Niemcy</option>
                    <option value="fr">Francja</option>
                    <option value="uk">Wielka Brytania</option>
                </select><br>
            </fieldset>

            <fieldset>
                <?php echo $tablesMessage ?><br>
                <?php
                use example as ex;
                echo ex\getDogName()
                ?><br>
            </fieldset>
            
            <fieldset>
                <p>
                    <input type="radio" id="male" name="gender" value="m">
                    <label for="male">Mężczyzna</label><br>
                    <input type="radio" id="female" name="gender" value="f">
                    <label for="female">Kobieta</label><br>
                    <input type="radio" id="dif" name="gender" value="i">
                    <label for="dif">Inne</label><br>
                    <input type="radio" id="undef" name="gender" value="u">
                    <label for="undef">Preferuję nie podawać</label><br>
                </p>
            </fieldset>
            
            <fieldset>
                <input type="checkbox" id="agree1" name="agree" value="agree">
                <label for="agree1">Zgadzam się na przetwarzanie danych osobowych</label><br>
                <input type="checkbox" id="agree2" name="agree2" value="agree2">
                <label for="agree2">Zgadzam się na wysyłanie materiałów promocyjnych</label><br>
            </fieldset>
            
            <input type="submit" value="Wyślij">
        </form> 
    </body>
</html>
<?php echo $_SERVER['REMOTE_ADDR']?><br>
<?php die("Script dies here");?>

// Pojedyńczy wyświetla dosłownie to co jest międzi ' '
// Podwójny pozwala na wywołanie operacji np. interpolacji 