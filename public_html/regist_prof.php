<?php
require('dbcon.php'); //faz a conexão com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
include("auth.php"); //incluir o arquivo de autenticação em todas a paginas privadas
?>
<title>Cursos</title>

<div class="container-fluid">
  <div class="card my-2">
    <div class="card-body">
      <?php Include("insert_prof.php"); //codigo de cadastro ?>
      <h1>Cadastrar novo Professor</h1>
      <form name="form" method="post" action="">
        <div class="form-group row">
          <div class="col-sm">
            <input type="hidden" name="new" value="1" />
            <input type="text" class="form-control my-1" name="nome" placeholder="Nome do professor" required />
          </div>
        </div>
        <input class="btn btn-warning my-1" name="submit" type="submit" value="Enviar" />
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
      <h2>Professores cadastrados</h2>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $count=1;
          $sel_query="Select * from professor ORDER BY id_prof desc;";
          $result = mysqli_query($con, $sel_query);
          while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $row["nome"]?></td>
              <td><a href="edit_prof.php?id_prof=<?php echo $row["id_prof"]; ?>">Editar</a></td>
              <td><a href="delete2.php?id_prof=<?php echo $row["id_prof"]; ?>">Excluir</a></td>
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
