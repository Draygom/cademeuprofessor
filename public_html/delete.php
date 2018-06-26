<?php //Arquivo que serve para deletar dados do banco de dados
require('dbcon.php'); //faz a conexão com o banco de dados

if ($id_curso=$_REQUEST['id_curso']) {
  $query = "DELETE FROM curso WHERE id_curso=$id_curso";
  $result = mysqli_query($con, $query) or die ( mysqli_error());
  header("Location: regist_curso.php");
}

if ($id_disc=$_REQUEST['id_disc']) {
  $query = "DELETE FROM disciplina WHERE id_disc=$id_disc";
  $result = mysqli_query($con, $query) or die ( mysqli_error());
  header("Location: regist_disc.php");
}

if ($id_prof=$_REQUEST['id_prof']) {
  $query = "DELETE FROM professor WHERE id_prof=$id_prof";
  $result = mysqli_query($con, $query) or die ( mysqli_error());
  header("Location: regist_prof.php");
}

if ($id_sala=$_REQUEST['id_sala']) {
  $query = "DELETE FROM sala WHERE id_sala=$id_sala";
  $result = mysqli_query($con, $query) or die ( mysqli_error());
  header("Location: regist_sala.php");
}

if ($id_aula=$_REQUEST['id_aula']) {
  $query = "DELETE FROM aula WHERE id_aula=$id_aula";
  $result = mysqli_query($con, $query) or die ( mysqli_error());
  header("Location: quadros.php");
}
?>
