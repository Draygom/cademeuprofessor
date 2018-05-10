<?php
include("auth.php"); //include auth.php file on all secure pages
include("menu.php");
?>
<title>Bem Vindo!</title>
<div class="container-fluid">
<p>Bem Vindo, <?php echo $_SESSION['username']; ?>!</p>
<p>Está é uma area restrita.</p>
<p><a href="dashboard.php">Painel de controle</a></p>
<a href="logout.php">Sair</a>
</div>
<?php
include("bottom.php");
?>
