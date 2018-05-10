<?php
//require('db.php');
//include("auth.php");
//include("menu.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$professor =$_REQUEST['professor'];
$disciplina = $_REQUEST['disciplina'];
$sala = $_REQUEST['sala'];
$curso = $_REQUEST['curso'];
$dia = $_REQUEST['dia'];
$ins_query="insert into qr_tabela (professor, disciplina, sala, curso, dia) VALUES ('$professor', '$disciplina', '$sala', '$curso', '$dia')";
mysqli_query($con,$ins_query) or die("<br> Erro: ".mysqli_error($con));
$status = "Novo cadastro inserio com sucesso.";
}
$query = mysqli_query($con, "SELECT * FROM qr_tabela GROUP BY curso")
or die("<br>Erro: ".mysqli_error($con));
?>
