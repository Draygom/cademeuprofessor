<?php
require('db.php');
include("menu.php");
include("auth.php");
?>
<title>Cadastros</title>

<div class="container-fluid">
  <?php Include("insert.php"); //codigo de cadastro ?>
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
    echo '<div class="alert alert-success alert-dismissible fade show">' .$status. '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
  }?>
</div>

<div class="container-fluid">
<h2>Cadastros</h2>

<table class="table table-dark">
  <thead>
  <tr>
     <th>#</th>
     <th>Professor</th>
     <th>Disciplina</th>
     <th>Sala</th>
     <th>Curso</th>
     <th>Dia</th>
  </tr>
  </thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from qr_tabela ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
     <td><?php echo $count; ?></td>
     <td><?php echo $row["professor"]?></td>
     <td><?php echo $row["disciplina"]?></td>
     <td><?php echo $row["sala"]?></td>
     <td><?php echo $row["curso"]?></td>
     <td><?php echo $row["dia"]?></td>
     <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Editar</a></td>
     <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Excluir</a></td>
  </tr>
<?php $count++; } ?>
</tbody>
</table>
</div>

<?php
include("bottom.php");
?>
