<?php
require('db.php'); //incliu o cabeçalho da pagina
include("auth.php");
include("menu.php");
$id=$_REQUEST['id'];
$query = "SELECT * from sala where id='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<title>Editar</title>
<div class="container-fluid">
<p><a href="dashboard.php">Painel de controle</a> | <a href="insert_sala.php">Novo cadastro de sala</a> | <a href="view_sala.php">Visualisar cadastros de sala</a> | <a href="logout.php">Sair</a></p>
<h1>Editar cadastro</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$sala =$_REQUEST['sala'];
$localizacao = $_REQUEST['localizacao'];
$update="update sala set sala='".$sala."', localizacao='".$localizacao."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Cadastro atualizado com sucesso.";
echo '<div class="alert alert-success">'.$status.'</div>';
}else {
?>
<div class="container-fluid">
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<input type="text" class="form-control my-1" name="sala" placeholder="Sala" required value="<?php echo $row['sala'];?>" />
<input type="text" class="form-control my-1" name="localizacao" placeholder="Localização" required value="<?php echo $row['localizacao'];?>" />
<input name="submit" class="btn btn-primary my-1" type="submit" value="Enviar" />
</form>
<?php } ?>
</div>
</div>
<?php
include("bottom.php");
?>
