<?php
require('db.php'); //incliu o cabeçalho da pagina
include("menu.php");
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from sala where id='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<title>Editar</title>

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
  <h1>Editar cadastro</h1>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<input type="text" class="form-control my-1" name="sala" placeholder="Sala" required value="<?php echo $row['sala'];?>" />
<input type="text" class="form-control my-1" name="localizacao" placeholder="Localização" required value="<?php echo $row['localizacao'];?>" />
<input name="submit" class="btn btn-primary my-1" type="submit" value="Enviar" />
</form>
<?php } ?>
</div>

<?php
include("bottom.php");
?>
