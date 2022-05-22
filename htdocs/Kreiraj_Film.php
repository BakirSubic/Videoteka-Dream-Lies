<?php

$page_title = 'Kreiraj Korisnika';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array(); // Niz za pohranjivanje errora.

//Provjeravanje da li je upisano Naziv:
    if (empty($_POST['Naziv'])) {
        $errors[] = 'Zaboravili ste upisati naziv filma';
    } else {
        $nf = trim($_POST['Naziv']);
    }
//Provjeravanje da li je upisano Datum:
    if (empty($_POST['Datum'])) {
        $errors[] = 'Zaboravili ste upisati datum';
    } else {
        $df = trim($_POST['Datum']);
    }
//Provjeravanje da li je upisana Jezik:
    if (empty($_POST['Jezik'])) {
        $errors[] = 'Zaboravili ste upisati jezik';
    } else $jf = trim($_POST['Jezik']);
    if (empty($errors)) { // Ako je sve ok.
//Registruj korisnika u bazu...
        require '../mysqli_connect.php';// Spajanje na bazu.
//Napraviti query:
        $q = /** @lang text */
            "INSERT INTO Film (Naziv, Datum, Jezik) VALUES ('$nf', '$df','$jf')";

        $r = @mysqli_query($dbc, $q); // Pokreni query.

        if ($r) { //Ako je uspijesno izvrsen query.
            //Isprintaj alert:
            echo /** @lang text */
            '<script type="text/JavaScript"> 
     alert("Uspjesno ste kreirali novi Film");
     window.open("Kreiraj_Film.php", "_self");
     </script>';
        } else { //Ako nije uspijesno izvrsen query.
            //Isprintaj alert:
            echo /** @lang text */
            '<script type="text/JavaScript"> 
     alert("System Error");
     window.open("Kreiraj_Film.php", "_self");
     </script>';
        } //Kraj if ($r)
        mysqli_close($dbc); //Zatvaranje konekcije sa bazom
        exit();
    } //Kraj if (empty($errors))
    else { //Ispis greske.
        echo /** @lang text */
        '<script type="text/JavaScript"> 
     alert("Doslo je do greske, molimo provjeri te vase unose");
     window.open("Kreiraj_Film.php", "_self");
     </script>';
    }
}

?>

<!DOCTYPE HTML>
<html lang="bs">
<head>
    <title>Kreiraj film</title>
    <link rel="stylesheet" href="styles/registerPage.css"/>
    <link rel="stylesheet" href="styles/navbar.css"/>
    <style>
        .registration-form {
            padding-top: 50px;
        }

        .form {
            height: 45%;
        }
    </style>
</head>
<body>
<div class="page">
    <div class="navbar">
        <div class="navbar-heading">
            <div class="heading">
                <img class="admin_icon" src="media/admin_control_panel_icon.png" alt="admin_control_panel_icon">
                Kontrole
            </div>
        </div>
        <div class="navbar-items">
            <div class="navbar-controls">
                <div>
                    <img src="media/rent_icon.png" alt="rented_movie_icon">
                </div>
                <div class="navbar-text">
                    <a href="Iznajmi_Film.php">Iznajmi Film</a>
                </div>
            </div>
            <div class="navbar-controls">
                <div>
                    <img src="media/movie_list_icon.png" alt="movie_list_icon">
                </div>
                <div class="navbar-text">
                    <a href="Movie_List.php">Pregled Filmova</a>
                </div>
            </div>
            <div class="navbar-controls">
                <div>
                    <img src="media/registered_users_icon.png" alt="registered_users_icon">
                </div>
                <div class="navbar-text">
                    <a href="Pregled_Korisnika.php">Pregled Korisnika</a>
                </div>
            </div>
            <div class="navbar-controls">
                <div>
                    <img src="media/rented_movie_icon.png" alt="rented_movie_icon">
                </div>
                <div class="navbar-text">
                    <a href="Iznajmljeni_Filmovi.php">Iznajmljeni Filmovi</a>
                </div>
            </div>
            <div class="navbar-controls">
                <div>
                    <img src="media/add_user_icon.png" alt="add_user_icon">
                </div>
                <div class="navbar-text">
                    <a href="register.php">Kreiraj Korisnika</a>
                </div>
            </div>
            <div class="navbar-controls" id="active">
                <div>
                    <img src="media/add_movie_icon.png" alt="add_movie_icon">
                </div>
                <div class="navbar-text">
                    <a href="Kreiraj_Film.php" style="color: #000000">Kreiraj Film</a>
                </div>
            </div>
        </div>
    </div>
    <div class="form">
        <h1>Kreiraj Novi Film</h1>
        <form action="Kreiraj_Film.php" method="post">
            <div class="registration-form">
                <label>
                    <input type="text" name="Naziv" size="15" maxlength="45"  required value="" placeholder="Naziv Filma" <?php
                    if (isset($_POST['Naziv'])) echo $_POST['Naziv']; ?>"
                </label>
            </div>
            <div class="registration-form">
                <label>
                    <input type="text" name="Datum" size="15" maxlength="45" required value="" placeholder="Godina izlaska filma"<?php
                    if (isset($_POST['Datum'])) echo $_POST['Datum']; ?>"
                </label>
            </div>
            <div class="registration-form">
                <label>
                    <input type="text" name="Jezik" size="15" maxlength="45" required value="" placeholder="Jezik Filma" <?php
                    if (isset($_POST['Jezik'])) echo $_POST['Jezik']; ?>"
                </label>
            </div>
            <div class="registration-form">
                <div class="button">
                    <label><input type="submit" name="submit" value="Kreiraj Film"/></label>
                </div>
        </form>
    </div>
</div>
</body>
</html>

