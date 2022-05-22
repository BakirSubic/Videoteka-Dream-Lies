<?php
require('../mysqli_connect.php');
$id=$_REQUEST['id'];
$query = /** @lang text */
    "DELETE FROM Iznajmljeni_Filmovi WHERE id=$id";
$result = mysqli_query($dbc,$query) or die ( mysqli_error());
echo /** @lang text */
'<script type=text/Javascript>
    alert("Uspjesno ste izbrisali iznajmu");
    window.open("Iznajmljeni_Filmovi.php", "_self");
</script>'
?>
