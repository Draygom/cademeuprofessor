<?php
require('dbcon.php');
include("menu.php");
include("auth.php");
$id_curso=$_REQUEST['id_curso'];
$query = "SELECT * from curso where id_curso='".$id_curso."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<title>Editar curso</title>

<?php
//altera na tabela os dados do curso
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id_curso=$_REQUEST['id_curso'];
$nome_curso=$_REQUEST['nome_curso'];
$update="update curso set nome_curso='".$nome_curso."' where id_curso='".$id_curso."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Cadastro atualizado com sucesso.";
echo '<div class="alert alert-success">'.$status.'</div>';
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=regist_cursos.php">';
}else {
?>
<!-- Formulário exibe os dados do curso e a opção de inserir novos dados -->
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h1>Editar Curso</h1>
      <form name="form" method="post" action="">
        <input type="hidden" name="new" value="1" />
        <input name="id_curso" type="hidden" value="<?php echo $row['id_curso'];?>" />
        <div class="form-group row">
          <div class="col">
            <label for="Curso" class="col-form-label"><b><?php echo $row['nome_curso'];?></b></label>
            <input type="text" class="form-control" name="nome_curso" placeholder="Nome" required />
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
