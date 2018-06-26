<?php
require('dbcon.php');
include("menu.php");
include("auth.php");
$id_sala=$_REQUEST['id_sala'];
$query = "SELECT * from sala where id_sala='".$id_sala."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<title>Editar</title>

<?php
//altera na tabela os dados da sala
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id_sala=$_REQUEST['id_sala'];
$nome_sala =$_REQUEST['nome_sala'];
$localizacao = $_REQUEST['localizacao'];
$update="update sala set nome_sala='".$nome_sala."', localizacao='".$localizacao."' where id_sala='".$id_sala."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Cadastro atualizado com sucesso.";
echo '<div class="alert alert-success">'.$status.'</div>';
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=regist_sala.php">';
}else {
?>
<!-- Formulário exibe os dados da sala e a opção de inserir novos dados -->
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h1>Editar sala</h1>
      <form name="form" method="post" action="">
        <div class="form-group row">
          <input type="hidden" name="new" value="1" />
          <input name="id_sala" type="hidden" value="<?php echo $row['id_sala'];?>" />
          <div class="col-sm">
            <label for="Sala" class="col-form-label"><b><?php echo $row['nome_sala'];?></b></label>
            <input type="text" class="form-control my-1" name="nome_sala" placeholder="Sala" required />
          </div>
          <div class="col-sm">
            <label for="Localização" class="col-form-label"><b><?php echo $row['localizacao'];?></b></label>
            <input type="text" class="form-control my-1" name="localizacao" placeholder="Localização" required />
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
