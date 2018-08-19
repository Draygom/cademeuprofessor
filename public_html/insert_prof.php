<?php
$status = "";

if(isset($_POST['new']) && $_POST['new']==1) {
  $nome = $_REQUEST['nome'];
  $query = mysqli_query($con, "SELECT nome FROM professor WHERE nome = '$nome'")
  or die("<br>Erro: ".mysqli_error($con));
  $resultado = mysqli_fetch_array($query);
  //se não tiver o mesmo nome realiza o cadastro.
  if ($nome != $resultado['nome']) {
    $ins_query="insert into professor (nome) VALUES ('$nome')";
    mysqli_query($con, $ins_query) or die("<br> Erro: ".mysqli_error($con));
    $status = "Novo cadastro inserido com sucesso.";
  } else {
    $status = "Este nome já existe!";
  }
}

?>
