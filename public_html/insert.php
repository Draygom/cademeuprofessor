<?php
require('db.php');
include("auth.php");
include("menu.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$professor =$_REQUEST['professor'];
$disciplina = $_REQUEST['disciplina'];
$sala = $_REQUEST['sala'];
$curso = $_REQUEST['curso'];
$dia = $_REQUEST['dia'];
$ins_query="insert into qr_tabela (professor, disciplina, sala, curso, dia) VALUES ('$professor', '$disciplina', '$sala', '$curso', '$dia')";
mysqli_query($con,$ins_query) or die("<br> Erro: ".mysqli_error($con));
$status = "Novo cadastro inserio com sucesso.";
}
$query = mysqli_query($con, "SELECT * FROM qr_tabela GROUP BY curso")
or die("<br>Erro: ".mysqli_error($con));
?>
<title>Novo cadastro</title>
<div class="container-fluid">
<p><a href="dashboard.php">Painel de Controle</a> | <a href="view.php">Visualisar cadastros</a> | <a href="logout.php">Sair</a></p>

<div class="container-fluid">
<h1>Novo cadastro</h1>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input type="text" class="form-control my-1" name="professor" placeholder="Professor" required />
<input type="text" class="form-control my-1" name="disciplina" placeholder="Disciplina" required />
<input type="text" class="form-control my-1" name="sala" placeholder="Sala" required />
<div class="input-group mb-1">
  <div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">Curso:</label>
  </div>
  <select class="custom-select" name="curso" id="curso">
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
  <select class="custom-select" name="dia">
  <option value="Segunda">Segunda</option>
  <option value="Terça">Terça</option>
  <option value="Quarta">Quarta</option>
  <option value="Quinta">Quinta</option>
  <option value="Sexta">Sexta</option>
  <option value="Sabádo">Sabádo</option>
</select>
</div>
<input class="btn my-1" name="submit" type="submit" value="Enviar" />
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
