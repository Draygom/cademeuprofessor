<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1) {
  //recebendo os dados do formulario html
  $titulo = $_REQUEST["titulo"];
  $sugestoes = $_REQUEST["sugestoes"];
  $data_envio = date("Y-m-d H:i:s");
  $query = mysqli_query($con, "INSERT INTO tb_sugestoes (titulo, sugestoes, data_envio) VALUES ('$titulo', '$sugestoes', '$data_envio')") or die("<br>erro<br>".mysqli_error($con));
  $status = "Sugestão enviada com sucesso.";
}
?>
