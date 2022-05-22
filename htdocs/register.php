<?php
$page_title = 'Register';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array(); // Niz za pohranjivanje errora.
//Provjeravanje da li je upisano ime:
    if (empty($_POST['ime'])) {
        $errors[] = 'Zaboravili ste upisati ime';
    } else {
        $fn = trim($_POST['ime']);
    }
//Provjeravanje da li je upisano prezime:
    if (empty($_POST['prezime'])) {
        $errors[] = 'Zaboravili ste upisati prezime';
    } else {
        $ln = trim($_POST['prezime']);
    }
//Provjeravanje da li je upisana adresa:
    if (empty($_POST['adresa'])) {
        $errors[] = 'Zaboravili ste upisati adresu';
    } else $e = trim($_POST['adresa']);
//Provjeravanje da li je upisan email:
    if (empty($_POST['email'])) {
        $errors[] = 'Zaboravili ste upisati email adresu';
    } else $t = trim($_POST['email']);
    if (empty($_POST['telefon'])) {
        $errors[] = 'Zaboravili ste upisati telefon';
    } else $f = trim($_POST['telefon']);
    if (empty($errors)) { // Ako je sve ok.
//Registruj korisnika u bazu...
        require '../mysqli_connect.php';// Spajanje na bazu.
//Napraviti query:
        $q = /** @lang text */
            "INSERT INTO clan (Ime, Prezime, Adresa, Telefon, email) VALUES ('$fn', '$ln','$e', '$f', '$t')";

        $r = @mysqli_query($dbc, $q); // Pokreni query.

        if ($r) { //Ako je uspijesno izvrsen query.
            //Isprintaj alert:
            echo /** @lang text */
            '<script type="text/JavaScript"> 
     alert("Uspjesno ste registrovali novog korisnika");
     window.open("register.php", "_self");
     </script>';
        } else { //Ako nije uspijesno izvrsen query.
            //Isprintaj alert:
            echo /** @lang text */
            '<script type="text/JavaScript"> 
     alert("System Error");
     </script>';
        } //Kraj if ($r)
        mysqli_close($dbc); //Zatvaranje konekcije sa bazom
        exit();
    } //Kraj if (empty($errors))
    else { //Ispis greske.
        echo /** @lang text */
        '<script type="text/JavaScript"> 
     alert("Doslo je do greske, molimo provjeri te vase unose");
     </script>';
    }
}
?>
<!DOCTYPE HTML>
<html lang="bs">
<head>
    <title>Kreiraj Korisnika</title>
    <link rel="stylesheet" href="styles/registerPage.css"/>
    <link rel="stylesheet" href="styles/navbar.css"/>
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
            <div class="navbar-controls" id="active">
                <div>
                    <img src="media/add_user_icon.png" alt="add_user_icon">
                </div>
                <div class="navbar-text">
                    <a href="register.php" style="color: #000000">Kreiraj Korisnika</a>
                </div>
            </div>
            <div class="navbar-controls">
                <div>
                    <img src="media/add_movie_icon.png" alt="add_movie_icon">
                </div>
                <div class="navbar-text">
                    <a href="Kreiraj_Film.php">Kreiraj Film</a>
                </div>
            </div>
        </div>
    </div>
    <div class="form">
        <h1>Registruj Novog Korisnika</h1>
        <form action="register.php" method="post">
            <div class="registration-form">
                <label>
                    <input type="text" name="ime" size="15" maxlength="45" required value="" placeholder="Ime" <?php
                    if (isset($_POST['ime'])) echo $_POST['ime']; ?>"
                </label>
            </div>
            <div class="registration-form">
                <label>
                    <input type="text" name="prezime" size="15" maxlength="45" required value="" placeholder="Prezime" <?php
                    if (isset($_POST['prezime'])) echo $_POST['prezime']; ?>"
                </label>
            </div>
            <div class="registration-form">
                <label>
                    <input type="text" name="adresa" size="15" maxlength="45" required value="" placeholder="Adresa" <?php
                    if (isset($_POST['adresa'])) echo $_POST['adresa']; ?>"
                </label>
            </div>
            <div class="registration-form">
                <label>
                    <input type="email" name="email" size="15" maxlength="45" required value="" placeholder="Email" <?php
                    if (isset($_POST['email'])) echo $_POST['email']; ?>"
                </label>
            </div>
            <div class="registration-form">
                <label>
                    <input type="text" name="telefon" size="15" maxlength="255" required value="" placeholder="Telefon" <?php
                    if (isset($_POST['telefon'])) echo $_POST['telefon']; ?>"
                </label>
            </div>
            <div class="registration-form">
                <div class="button">
                    <label><input type="submit" name="submit" value="Registruj korisnika"/></label>
                </div>
        </form>
    </div>
</div>
</body>
</html>

