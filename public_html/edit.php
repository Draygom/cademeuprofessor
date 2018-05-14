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
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=view.php">';
}else {
?>

<?php $query = mysqli_query($con, "SELECT * FROM qr_tabela GROUP BY curso")
or die("<br>Erro: ".mysqli_error($con)); ?>

<div class="container-fluid">
  <h1>Editar cadastro</h1>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />

<div class="form-group row">
  <label for="Professor" class="col-xl-2 col-form-label"><b>Professor:</b> <?php echo $row['professor'];?></label>
  <div class="col">
    <input type="text" class="form-control my-1" name="professor" placeholder="Professor" required />
  </div>
</div>

<div class="form-group row">
  <label for="Disciplina" class="col-xl-2 col-form-label"><b>Disciplina:</b> <?php echo $row['disciplina'];?></label>
  <div class="col">
    <input type="text" class="form-control my-1" name="disciplina" placeholder="Disciplina" required />
  </div>
</div>

<div class="form-group row">
  <label for="Sala" class="col-xl-2 col-form-label"><b>Sala:</b> <?php echo $row['sala'];?></label>
  <div class="col">
    <input type="text" class="form-control my-1" name="sala" placeholder="Sala" required />
  </div>
</div>

<div class="input-group mb-2">
  <div class="input-group-prepend">
    <label class="input-group-text" for="Curso"><?php echo $row['curso'];?>:</label>
  </div>
  <select class="custom-select" name="curso" required >
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
  <label class="input-group-text" for="Sala"><?php echo $row['dia'];?>:</label>
  </div>
  <select class="custom-select" name="dia" required >
  <option value="Segunda">Segunda</option>
  <option value="Terça">Terça</option>
  <option value="Quarta">Quarta</option>
  <option value="Quinta">Quinta</option>
  <option value="Sexta">Sexta</option>
  <option value="Sabádo">Sabádo</option>
</select>
</div>
<input name="submit" class="btn btn-warning my-1" type="submit" value="Enviar" />
</form>
<button type="button" class="btn btn-warning" onClick="history.go(-1)">Voltar</button>
<?php } ?>
</div>

<?php
include("bottom.php");
?>
