<?php
//require('db.php');
//include("auth.php");
//include("menu.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$sala = $_REQUEST['sala'];
$localizacao = $_REQUEST['localizacao'];
$ins_query="insert into sala (sala, localizacao) VALUES ('$sala', '$localizacao')";
mysqli_query($con,$ins_query) or die("<br> Erro: ".mysqli_error($con));
$status = "Novo cadastro inserio com sucesso.";
}
?>
