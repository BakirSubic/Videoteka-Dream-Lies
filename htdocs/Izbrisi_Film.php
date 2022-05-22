<?php
require('../mysqli_connect.php');
$id=$_REQUEST['id'];
$query = /** @lang text */
    "DELETE FROM Film WHERE id=$id";
$result = mysqli_query($dbc,$query) or die ( mysqli_error());
echo /** @lang text */
'<script type=text/Javascript>
    alert("Uspjesno ste izbrisali film");
    window.open("Movie_List.php", "_self");
</script>'
?>
S