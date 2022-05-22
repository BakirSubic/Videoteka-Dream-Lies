<?php
require ('../mysqli_connect.php');
$sql = /** @lang text */
    "SELECT  `Id`,`Naziv` FROM `Film` WHERE 1;";
$r = mysqli_query ($dbc, $sql);
$sqlc = /** @lang text */
    "SELECT  `Id`,`Ime` FROM `clan` WHERE 1;";
$rc = mysqli_query ($dbc, $sqlc);

if(isset($_POST['submit'])){
    $fid = trim($_POST['film']);
    $intfid = (int)$fid;
    $cid = trim($_POST['clan']);
    $intcid = (int)$cid;
    $diz = $_POST['diz'];
    $dvr = $_POST['dvr'];
    $f = /** @lang text */
        "INSERT INTO Iznajmljeni_Filmovi (Datum_Vracanja,Datum_Iznajmljivanja,Clan_Id,Film_Id) VALUES ('$dvr','$diz','$intcid','$intfid')";
    $query_run = mysqli_query($dbc, $f);

    if($query_run){
        echo /** @lang text */
        '<script type=text/JavaScript>
            alert("Uspjesno ste iznajmili film");
            window.open("Iznajmi_Film.php","_self");
</script>';
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Iznajmi Film</title>
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/registerPage.css">
    <style>
        select {
            width: 100%;
            height: 75%;
        }

        .form {
            height: 52.5%;
        }
    </style>
</head>
<div class="page">
    <div class="navbar">
        <div class="navbar-heading">
            <div class="heading">
                <img class="admin_icon" src="media/admin_control_panel_icon.png" alt="admin_control_panel_icon">
                Kontrole
            </div>
        </div>
        <div class="navbar-items">
            <div class="navbar-controls" id="active">
                <div>
                    <img src="media/rent_icon.png" alt="rented_movie_icon">
                </div>
                <div class="navbar-text">
                    <a href="Iznajmi_Film.php" style="color: #000000">Iznajmi Film</a>
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
        <form id="form" name="form" method="post">
            <h2>Izaberi te Film:</h2>
            <div class="registration-form">
                    <select name="film">
                        <option value="">Film</option>

                        <?php

                        while ($cat = mysqli_fetch_array(
                            $r,MYSQLI_ASSOC)):;

                            ?>
                            <option value="<?php echo $cat['Id'];
                            ?>">
                                <?php echo $cat['Naziv'];?>
                            </option>
                        <?php
                        endwhile;
                        ?>
                    </select>
            </div>

            <h2>Izaberite clana:</h2>
            <div class="registration-form">
                    <select name="clan">
                        <option value="">Clan</option>

                        <?php

                        while ($cat = mysqli_fetch_array(
                            $rc,MYSQLI_ASSOC)):;

                            ?>
                            <option value="<?php echo $cat['Id'];
                            ?>">
                                <?php echo $cat['Ime'];?>
                            </option>
                        <?php
                        endwhile;
                        ?>
                    </select>
            </div>

            <div class="registration-form">
                <label>
                    <input type="text" name="diz" size="15" maxlength="45" required value="" placeholder="datum iznajmljivanja" <?php
                    if (isset($_POST['diz'])) echo $_POST['diz']; ?>">
                </label>
            </div>
            <div class="registration-form">
                <label>
                    <input type="text" name="dvr" size="15" maxlength="45" required value="" placeholder="datum vracanja" <?php
                    if (isset($_POST['dvr'])) echo $_POST['dvr']; ?>">
                </label>
            </div>

            <div class="button">
                <label><input type="submit" name="submit" value="Submit" /></label>
            </div>
        </form>
    </div>
</div>
</body>
</html>
