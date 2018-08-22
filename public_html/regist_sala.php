<?php
require('dbcon.php'); //faz a conexão com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
include("auth.php"); //incluir o arquivo de autenticação em todas a paginas privadas
?>
<title>Salas</title>

<div class="container-fluid">
  <div class="card my-2">
    <div class="card-body">
      <?php Include("insert_sala.php"); //codigo de cadastro ?>
      <h1>Cadastrar nova sala</h1>
      <form name="form" method="post" action="">
        <div class="form-group row">
          <div class="col-sm">
            <input type="hidden" name="new" value="1" />
            <input type="text" class="form-control my-1" name="nome_sala" placeholder="Nome da sala" required />
            <input type="text" class="form-control my-1" name="localizacao" placeholder="Localização" required />
          </div>
        </div>
        <input class="btn btn-warning my-1" name="submit" type="submit" value="Enviar" />
        <a href="dashboard.php" class="btn btn-outline-light"  style="background-color:#ee7f22" >Voltar</a>
      </form>
      <?php
      //exibe a confirmação do cadastro
      if($status !== ""){
        echo '<div class="alert alert-success alert-dismissible fade show">' .$status. '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>';
      }?>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <h2>Salas cadastradas</h2>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Localização</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $count=1;
          $sel_query="Select * from sala ORDER BY id_sala;";
          $result = mysqli_query($con, $sel_query);
          while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $row["nome_sala"]?></td>
              <td><?php echo $row["localizacao"]?></td>
              <td><a href="edit_sala.php?id_sala=<?php echo $row["id_sala"]; ?>">Editar</a></td>
              <td><a href="delete.php?id_sala=<?php echo $row["id_sala"]; ?>">Excluir</a></td>
            </tr>
            <?php
            $count++;
          }?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
include("bottom.php");
?>
