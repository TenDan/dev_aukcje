<?php
    require_once "aukcja.php";

    $servername = "localhost";
    $username = "root";
    $password = "lubiekremowki123";
    $database = "aukcje";

    $conn = new mysqli($servername, $username, $password, $database);

    $typ = $_POST['typ'];
    $tytul = $_POST['tytul'];
    $item = $_POST['item'];
    $opis = $_POST['opis'];
    $cena = $_POST['cena'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $tytul = htmlentities($tytul, ENT_QUOTES, "UTF-8");
    $item = htmlentities($item, ENT_QUOTES, "UTF-8");
    $opis = htmlentities($opis, ENT_QUOTES, "UTF-8");
    $cena = htmlentities($cena, ENT_QUOTES, "UTF-8");

    if ($conn->connect_error) {
        die("Connection failed:". $conn->connect_error);
    }

    if (strlen($typ) > 0 && strlen($tytul) > 0 && strlen($item) > 0 && strlen($opis) > 0 && strlen($cena) > 0) {
        $sql = "CREATE TABLE IF NOT EXISTS ogloszenia 
        (id INT(6) AUTO_INCREMENT PRIMARY KEY, 
        typ VARCHAR(9) NOT NULL,
        tytul VARCHAR(50) NOT NULL,
        item VARCHAR(40) NOT NULL,
        opis VARCHAR(240) NOT NULL,
        cena INT(10),
        reg_date TIMESTAMP
        )";

        $sql_insert = "INSERT INTO ogloszenia (typ, tytul, item, opis, cena) VALUES ('$typ', '$tytul', '$item', '$opis', '$cena')";
        if ($conn->query($sql) === TRUE) {
            
        }
        else {
            
        }

        if ($conn->query($sql_insert) === TRUE) {
                /*$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                }
                else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                if ($_FILES["fileToUpload"]["size"] > 8000000) {
                    echo "Przepraszamy, ten rozmiar jest za duży";
                    $uploadOk = 0;
                }
                else {
                    echo "Udało się";
                    $uploadOk = 1;
                }

                if ($uploadOk = 1) {
                    header("Location: /dev_aukcje/index.php");
                    echo "Udało się";
                }
                else {
                    header("Location: /dev_aukcje/layout/aukcja.php");
                }
                */
            header("Location: /dev_aukcje/index.php");
                
        }
        else {
                echo "Nie udało się:" .$conn->error;
        }
    }
    else {
        header("Location: /dev_aukcje/layout/aukcja.php");
        $itemErr = $itemErr;
        $tytulErr = $tytulErr;
        $opisErr = $opisErr;
        $cenaErr = $cenaErr;
    }
 
?>