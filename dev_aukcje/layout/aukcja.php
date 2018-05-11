<?php
    $servername = "localhost";
    $username = "root";
    $password = "lubiekremowki123";

    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Wystąpił błąd: ".$conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS aukcje";
    if ($conn->query($sql) == TRUE) {
        
    }
    else {
        
    }

    $typErr = $tytulErr = $itemErr = $opisErr = $cenaErr = "";

    $conn->close();
    $wszystko_OK = false;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tworzenie ogłoszenia</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../styles.css" />
    </head>
    <body>
        <h1>Tworzysz aukcję</h1>
        <form action="utworz.php" method="post">
            <select id="typ" name="typ">
                <option>Pojazd</option>
                <option>Przedmiot</option>
                <option>Dom</option>
            </select>
            <br>
            <label for="tytul">Treść ogłoszenia</label>
            <br>
            <input type="text" name="tytul" id="tytul" />
            <span class="error"><?php echo $tytulErr; ?></span>
            <br>
            <label for="item">Co chcesz sprzedać?</label>
            <br>
            <input type="text" name="item" id="item" />
            <span class="error"><?php echo $itemErr; ?></span>
            <br>
            <label for="opis">Opis przedmiotu</label>
            <br>
            <textarea rows="5" cols="40" sizeable="false" name="opis" id="opis"></textarea>
            <span class="error"><?php echo $opisErr; ?></span>
            <br>
            <label for="cena">W jakiej cenie?</label>
            <br>
            <input type="number" name="cena" id="cena" />
            <span class="error"><?php echo $cenaErr; ?></span>
            <br>
            <!--<input type="file" name="fileToUpload" id="fileToUpload" /> -->
            <br><br>
            <input type="submit" id="validate" value="Wyślij" /><br>
        </form>
    </body>
</html>