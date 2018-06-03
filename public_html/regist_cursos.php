<?php
require('dbcon.php'); //faz a conexão com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
include("auth.php"); //incluir o arquivo de autenticação em todas a paginas privadas
?>
<title>Cursos</title>

<div class="container-fluid">
  <div class="card my-2">
    <div class="card-body">
      <?php Include("insert_curso.php"); //codigo de cadastro ?>
      <h1>Cadastrar novo curso</h1>
      <form name="form" method="post" action="">
        <div class="form-group row">
          <div class="col-sm">
            <input type="hidden" name="new" value="1" />
            <input type="text" class="form-control my-1" name="nome_curso" placeholder="Nome do curso" required />
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
      <h2>Cursos cadastrados</h2>
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
          $sel_query="Select * from curso ORDER BY id_curso desc;";
          $result = mysqli_query($con, $sel_query);
          while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $row["nome_curso"]?></td>
              <td><a href="edit_curso.php?id_curso=<?php echo $row["id_curso"]; ?>">Editar</a></td>
              <td><a href="delete2.php?id_curso=<?php echo $row["id_curso"]; ?>">Excluir</a></td>
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
