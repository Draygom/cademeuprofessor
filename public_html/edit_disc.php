<?php
require('dbcon.php');
include("menu.php");
include("auth.php");
$id_disc=$_REQUEST['id_disc'];
$query = "SELECT * from disciplina where id_disc='".$id_disc."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<title>Editar disciplina</title>

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id_disc=$_REQUEST['id_disc'];
$nome_disc=$_REQUEST['nome_disc'];
$update="update disciplina set nome_disc='".$nome_disc."' where id_disc='".$id_disc."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Cadastro atualizado com sucesso.";
echo '<div class="alert alert-success">'.$status.'</div>';
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=regist_disc.php">';
}else {
?>
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h1>Editar disciplina</h1>
      <form name="form" method="post" action="">
        <input type="hidden" name="new" value="1" />
        <input name="id_curso" type="hidden" value="<?php echo $row['id_curso'];?>" />
        <div class="form-group row">
          <div class="col">
            <label for="Disciplina" class="col-form-label"><b><?php echo $row['nome_disc'];?></b></label>
            <input type="text" class="form-control" name="nome_disc" placeholder="Nome" required />
          </div>
        </div>
        <input name="submit" class="btn btn-warning my-1" type="submit" value="Enviar" /> <button type="button" class="btn btn-warning" onClick="history.go(-1)">Voltar</button>
      </form>
      <?php } ?>
    </div>
  </div>
</div>

<?php
include("bottom.php");
?>
