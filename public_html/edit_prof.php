<?php
require('dbcon.php');
include("menu.php");
include("auth.php");
$id_prof=$_REQUEST['id_prof'];
$query = "SELECT * from professor where id_prof='".$id_prof."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<title>Editar professor</title>

<?php
//altera na tabela os dados do professor
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id_prof=$_REQUEST['id_prof'];
$nome=$_REQUEST['nome'];
$update="update professor set nome='".$nome."' where id_prof='".$id_prof."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Cadastro atualizado com sucesso.";
echo '<div class="alert alert-success">'.$status.'</div>';
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=regist_prof.php">';
}else {
?>
<!-- Formulário exibe os dados do professor e a opção de inserir novos dados -->
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h1>Editar Professor</h1>
      <form name="form" method="post" action="">
        <input type="hidden" name="new" value="1" />
        <input name="id_curso" type="hidden" value="<?php echo $row['id_prof'];?>" />
        <div class="form-group row">
          <div class="col">
            <label for="Professor" class="col-form-label"><b><?php echo $row['nome'];?></b></label>
            <input type="text" class="form-control" name="nome" placeholder="Nome" required />
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
