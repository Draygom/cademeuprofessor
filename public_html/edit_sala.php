<?php
require('db.php'); //incliu o cabeçalho da pagina
include("menu.php");
include("auth.php");
$id_sala=$_REQUEST['id_sala'];
$query = "SELECT * from sala where id_sala='".$id_sala."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<title>Editar</title>

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id_sala=$_REQUEST['id_sala'];
$sala =$_REQUEST['sala'];
$localizacao = $_REQUEST['localizacao'];
$update="update sala set sala='".$sala."', localizacao='".$localizacao."' where id_sala='".$id_sala."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Cadastro atualizado com sucesso.";
echo '<div class="alert alert-success">'.$status.'</div>';
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=view_sala.php">';
}else {
?>
<div class="container-fluid justify-content-end">
  <h1>Editar cadastro</h1>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input name="id_sala" type="hidden" value="<?php echo $row['id_sala'];?>" />
<input type="text" class="form-control my-1" name="sala" placeholder="Sala" required value="<?php echo $row['sala'];?>" />
<input type="text" class="form-control my-1" name="localizacao" placeholder="Localização" required value="<?php echo $row['localizacao'];?>" />
<input name="submit" class="btn btn-warning my-1" type="submit" value="Enviar" />
</form>
<button type="button" class="btn btn-warning" onClick="history.go(-1)">Voltar</button>
<?php } ?>
</div>

<?php
include("bottom.php");
?>
