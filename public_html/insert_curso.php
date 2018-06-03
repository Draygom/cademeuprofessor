<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$nome_curso = $_REQUEST['nome_curso'];
$ins_query="insert into curso (nome_curso) VALUES ('$nome_curso')";
mysqli_query($con, $ins_query) or die("<br> Erro: ".mysqli_error($con));
$status = "Novo cadastro inserido com sucesso.";
}
?>
