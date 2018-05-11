<?php
require('db.php');
include("menu.php");
include("auth.php");
?>
<title>Cadastros</title>

<div class="container-fluid">
  <?php Include("insert_sala.php"); //codigo de cadastro ?>
  <h1>Novo cadastro de sala</h1>
  <form name="form" method="post" action="">
  <input type="hidden" name="new" value="1" />
  <input type="text" class="form-control my-1" name="sala" placeholder="Sala" required />
  <input type="text" class="form-control my-1" name="localizacao" placeholder="Localização" required />
  <input class="btn btn my-1" name="submit" type="submit" value="Enviar" />
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
     <th>Sala</th>
     <th>Localização</th>
  </tr>
  </thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from sala ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
     <td><?php echo $count; ?></td>
     <td><?php echo $row["sala"]?></td>
     <td><?php echo $row["localizacao"]?></td>
     <td><a href="edit_sala.php?id=<?php echo $row["id"]; ?>">Editar</a></td>
     <td><a href="delete_sala.php?id=<?php echo $row["id"]; ?>">Excluir</a></td>
  </tr>
<?php $count++; } ?>
</tbody>
</table>
</div>

<?php
include("bottom.php");
?>
