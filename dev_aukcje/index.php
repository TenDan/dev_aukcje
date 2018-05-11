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

    $database = "aukcje";
    $conn_2 = new mysqli($servername, $username, $password, $database);
    if ($conn_2->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }

    $sql_select = "SELECT typ, tytul, item, opis, cena, reg_date FROM ogloszenia";
    $result = $conn_2->query($sql_select);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel aukcji</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h1>Witamy na aukcjach</h1>
    <a href="layout/aukcja.php">Utwórz ogłoszenie</a><br>
       <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="ogloszenie">';
                    echo "Przesłano ".$row['reg_date']."<br>";
                    echo $row['typ']."<br>";
                    echo "<b>".$row['tytul']."</b><br>";
                    echo $row['item']."<br>";
                    echo $row['cena']."<br>";
                    echo $row['opis']."<br>";
                    echo '</div>';
                }
            } 
            else {
                echo "Na razie nie ma żadnych aukcji";
            }
            $conn->close();
        ?>
</body>
</html>