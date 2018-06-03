<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$nome = $_REQUEST['nome'];
$ins_query="insert into professor (nome) VALUES ('$nome')";
mysqli_query($con, $ins_query) or die("<br> Erro: ".mysqli_error($con));
$status = "Novo cadastro inserido com sucesso.";
}
?>
