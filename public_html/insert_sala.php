<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$nome_sala = $_REQUEST['nome_sala'];
$localizacao = $_REQUEST['localizacao'];
$ins_query="insert into sala (nome_sala, localizacao) VALUES ('$nome_sala', '$localizacao')";
mysqli_query($con,$ins_query) or die("<br> Erro: ".mysqli_error($con));
$status = "Novo cadastro inserio com sucesso.";
}
?>
