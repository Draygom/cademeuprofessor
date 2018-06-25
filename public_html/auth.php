<?php
//session_start();
if (!isset($_SESSION["apelido"]) && !isset($_SESSION["id_usuarios"])) {
  header("Location: login.php");
  exit();
}
?>
