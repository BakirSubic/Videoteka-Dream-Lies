<?php
require '../mysqli_connect.php';
$d = $_REQUEST['id'];
$query = "SELECT * from clan where id='" . $d . "'";
$result = mysqli_query($dbc, $query) or die (mysqli_error());
$row = mysqli_fetch_assoc($result);
if ($result) {
    echo '<script type=Javascript>
    alert("Uspjesno ste editovali film")
</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/registerPage.css">
    <style>
        * {
            margin: 0;
        }

        .form {
            height: 55%;
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
            <div class="navbar-controls"  id="active">
                <div>
                    <img src="media/registered_users_icon.png" alt="registered_users_icon">
                </div>
                <div class="navbar-text">
                    <a href="Pregled_Korisnika.php" style="color: #000000">Pregled Korisnika</a>
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
    <?php
    $status = "";
    if (isset($_POST['new']) && $_POST['new'] == 1) {
        $id = $_REQUEST['id'];
        $ime = $_REQUEST['Ime'];
        $prezime = $_REQUEST['Prezime'];
        $adresa = $_REQUEST['Adresa'];
        $telefon = $_REQUEST['Telefon'];
        $email = $_REQUEST['email'];
        $update = /** @lang text */
            "update clan set Ime='" . $ime . "',
        Prezime='" . $prezime . "', Adresa='" . $adresa . "', Telefon='" . $telefon . "', email='" . $email . "' where id='" . $id . "'";
        mysqli_query($dbc, $update) or die(mysqli_error());
        echo /** @lang text */
        '<script type=text/JavaScript>
                alert("Uspjesno ste editovali clana")
                window.open("Pregled_Korisnika.php", "_self");
                </script>';
    } else {
        ?>
        <div class="form">
            <h1>Edituj clana</h1>
            <form name="form" method="post" action="">
                <input type="hidden" name="new" value="1"/>
                <div class="registration-form">
                    <label>
                        <input type="text" name="Ime" size="15" maxlength="45" placeholder="Ime clana"
                               required value="<?php echo $row['Ime']; ?>" :>
                    </label>
                </div>
                <div class="registration-form">
                    <label>
                        <input type="text" name="Prezime" size="15" maxlength="45" placeholder="Prezime clana"
                               required value="<?php echo $row['Prezime']; ?>">
                    </label>
                </div>
                <div class="registration-form">
                    <label>
                        <input type="text" name="Adresa" size="15" maxlength="45" placeholder="Adresa clana"
                               required value="<?php echo $row['Adresa']; ?>">
                    </label>
                </div>
                <div class="registration-form">
                    <label>
                        <input type="text" name="Telefon" size="15" maxlength="45" placeholder="Telefon clana"
                               required value="<?php echo $row['Telefon']; ?>">
                    </label>
                </div>
                <div class="registration-form">
                    <label>
                        <input type="text" name="email" size="15" maxlength="45" placeholder="email clana"
                               required value="<?php echo $row['email']; ?>">
                    </label>
                </div>
                <div class="registration-form">
                    <div class="button">
                        <label><input type="submit" name="submit" value="Update"/></label>
                    </div>
                </div>
            </form>
        </div>
    <?php } ?>
</div>
</body>
</html>
