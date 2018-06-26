<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1) {
  //recebendo os dados do formulario html
  $titulo = $_REQUEST["titulo"];
  $sugestoes = $_REQUEST["sugestoes"];
  $query = mysqli_query($con, "INSERT INTO tb_sugestoes (titulo, sugestoes) VALUES ('$titulo', '$sugestoes')") or die("<br>erro<br>".mysqli_error($con));
  $status = "Sugestão enviada com sucesso.";
}
?>
