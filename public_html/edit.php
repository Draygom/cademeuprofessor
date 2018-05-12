<?php
require('db.php');
include("menu.php");
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from qr_tabela where id='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<title>Editar</title>

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$professor =$_REQUEST['professor'];
$disciplina = $_REQUEST['disciplina'];
$sala = $_REQUEST['sala'];
$curso = $_REQUEST['curso'];
$dia = $_REQUEST['dia'];
$update="update qr_tabela set professor='".$professor."', disciplina='".$disciplina."', sala='".$sala."', curso='".$curso."', dia='".$dia."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Cadastro atualizado com sucesso.";
echo '<div class="alert alert-success">'.$status.'</div>';
}else {
?>

<?php $query = mysqli_query($con, "SELECT * FROM qr_tabela GROUP BY curso")
or die("<br>Erro: ".mysqli_error($con)); ?>

<div class="container-fluid">
  <h1>Editar cadastro</h1>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<input type="text" class="form-control my-1" name="professor" placeholder="Professor" required value="<?php echo $row['professor'];?>" />
<input type="text" class="form-control my-1" name="disciplina" placeholder="Disciplina" required value="<?php echo $row['disciplina'];?>" />
<input type="text" class="form-control my-1" name="sala" placeholder="Sala" required value="<?php echo $row['sala'];?>" />
<div class="input-group mb-1">
  <div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">Curso:</label>
  </div>
  <select class="custom-select" name="curso" required value="<?php echo $row['curso'];?>">
    <?php
    // Colocando os dados retornados pela consulta em um vetor $resultado
    while ($resultado = mysqli_fetch_array($query)) {
      ?>
  <option value="<?php echo $resultado["curso"] ?>"><?php echo $resultado["curso"] ?></option>
  <?php
  } // fim while
  ?>
  </select>
</div>
<div class="input-group">
  <div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">Dia:</label>
  </div>
  <select class="custom-select" name="dia" required value="<?php echo $row['dia'];?>">
  <option value="Segunda">Segunda</option>
  <option value="Terça">Terça</option>
  <option value="Quarta">Quarta</option>
  <option value="Quinta">Quinta</option>
  <option value="Sexta">Sexta</option>
  <option value="Sabádo">Sabádo</option>
</select>
</div>
<input name="submit" class="btn btn-primary my-1" type="submit" value="Enviar" />
</form>
<?php } ?>
</div>

<?php
include("bottom.php");
?>
