<?php
require('db.php');
$id_sala=$_REQUEST['id_sala'];
$query = "DELETE FROM sala WHERE id_sala=$id_sala";
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view_sala.php");
?>
