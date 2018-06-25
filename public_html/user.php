<?php
include("menu.php");
include("auth.php"); //include auth.php file on all secure pages
?>
<title>Bem Vindo!</title>
<div class="container-fluid">
<p>Bem Vindo, <?php echo $_SESSION['apelido']; ?>!</p>

<p>Está é uma area restrita.</p>

<p><a href="dashboard.php">Painel de controle</a><p>

</div>
<?php
include("bottom.php");
?>
