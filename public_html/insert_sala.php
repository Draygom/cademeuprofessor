<?php
require('db.php');
include("auth.php");
include("menu.php");
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
<title>Novo cadastro</title>
<div class="container-fluid">
<p><a href="dashboard.php">Painel de Controle</a> | <a href="view_sala.php">Visualisar cadastros de sala</a> | <a href="logout.php">Sair</a></p>

<div class="container-fluid">
<h1>Novo cadastro de sala</h1>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input type="text" class="form-control my-1" name="sala" placeholder="Sala" required />
<input type="text" class="form-control my-1" name="localizacao" placeholder="Localização" required />
<input class="btn btn my-1" name="submit" type="submit" value="Enviar" />
</form>
<?php
//exibe a confirmação do cadastro
if($status !== ""){
  echo '<div class="alert alert-success">' .$status. '</div>';
}?>

</div>
</div>
<?php
include("bottom.php");
?>
