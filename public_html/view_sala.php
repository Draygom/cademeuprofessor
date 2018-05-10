<?php
require('db.php');
include("auth.php");
include("menu.php");
?>
<title>Cadastros</title>
<div class="container-fluid">
<p><a href="dashboard.php">Painel de controle</a> | <a href="insert_sala.php">Novo Cadastro de sala</a> | <a href="logout.php">Sair</a></p>
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
