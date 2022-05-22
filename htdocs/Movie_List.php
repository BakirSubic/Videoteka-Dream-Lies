<?php

$page_title = 'Pregled Filmova';


include('../mysqli_connect.php');
$q = /** @lang text */
    "SELECT * FROM Film";
$result = mysqli_query($dbc, $q);

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Pregled Filmova</title>
    <link rel="stylesheet" href="styles/navbar.css"/>
    <link rel="stylesheet" href="styles/Movie_List_Page.css">
    <style>
        #table {
            width: 250%;
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
            <div class="navbar-controls" id="active">
                <div>
                    <img src="media/movie_list_icon.png" alt="movie_list_icon">
                </div>
                <div class="navbar-text">
                    <a href="Movie_List.php" style="color: #000000">Pregled Filmova</a>
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
    <div class="table-box">
        <table id="table">
            <tr>
                <th>Naziv</th>
                <th>Godina snimanja</th>
                <th>Jezik</th>
                <th>Promjeni</th>
                <th>Izbrisi</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                $sn = 1;
                while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $data['Naziv']; ?> </td>
                        <td><?php echo $data['Datum']; ?> </td>
                        <td><?php echo $data['Jezik']; ?> </td>
                        <td><a style="color: #000000" href="Promjeni_Podatke_Film.php?id=<?php echo $data['Id']; ?>">Promjeni</a></td>
                        <td><a style="color: #000000" href="Izbrisi_Film.php?id=<?php echo $data['Id']; ?>">Izbrisi</a></td>
                    <tr>
                    <?php
                    $sn++;
                }
            } else { ?>
                <tr>
                    <td colspan="8">No data found</td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
</div>
</body>
</html>
