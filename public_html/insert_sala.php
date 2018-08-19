<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1) {
  $nome_sala = $_REQUEST['nome_sala'];
  $localizacao = $_REQUEST['localizacao'];
  $query = mysqli_query($con, "SELECT nome_sala, localizacao FROM sala WHERE nome_sala = '$nome_sala' AND localizacao = '$localizacao'")
  or die("<br>Erro: ".mysqli_error($con));
  $resultado = mysqli_fetch_array($query);
  if ($nome_sala != $resultado['nome_sala'] && $localizacao != $resultado['localizacao']) {
    $ins_query="insert into sala (nome_sala, localizacao) VALUES ('$nome_sala', '$localizacao')";
    mysqli_query($con,$ins_query) or die("<br> Erro: ".mysqli_error($con));
    $status = "Novo cadastro inserio com sucesso.";
  } else {
  $status = "Esta sala já existe!";
  }
}
?>
