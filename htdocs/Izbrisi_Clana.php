<?php
require('../mysqli_connect.php');
$id=$_REQUEST['id'];
$query = /** @lang text */
    "DELETE FROM clan WHERE id=$id";
$result = mysqli_query($dbc,$query) or die ( mysqli_error());
echo /** @lang text */
'<script type=text/Javascript>
    alert("Uspjesno ste izbrisali korisnika");
    window.open("Pregled_Korisnika.php", "_self");
</script>'
?>
