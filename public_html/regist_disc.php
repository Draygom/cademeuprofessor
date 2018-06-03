<?php
require('dbcon.php'); //faz a conexão com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
include("auth.php"); //incluir o arquivo de autenticação em todas a paginas privadas
?>
<title>Cursos</title>

<div class="container-fluid">
  <div class="card my-2">
    <div class="card-body">
      <?php Include("insert_disc.php"); //codigo de cadastro ?>
      <h1>Cadastrar nova disciplina</h1>
      <form name="form" method="post" action="">
        <div class="form-group row">
          <div class="col-sm">
            <input type="hidden" name="new" value="1" />
            <select class="custom-select" required name="id_curso" id="curso">
              <option >-- Selecione o Curso --</option>
              <?php
              // Colocando os dados retornados pela consulta em um vetor $resultado
              while ($resultado = mysqli_fetch_array($query)) {
                ?>
            <option value="<?php echo $resultado["id_curso"] ?>"><?php echo $resultado["nome_curso"] ?></option>
            <?php
          } // fim while
          ?>
            </select>
            <input type="text" class="form-control my-1" name="nome_disc" placeholder="Nome da disciplina" required />
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
      <h2>Disciplinas cadastradas</h2>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Curso</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $count=1;
          $sel_query="SELECT id_disc, disciplina.nome_disc, curso.nome_curso from disciplina INNER JOIN curso ON disciplina.curso_id_curso = curso.id_curso ORDER BY id_curso desc;";
          $result = mysqli_query($con, $sel_query);
          while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $row["nome_disc"]?></td>
              <td><?php echo $row["nome_curso"]?></td>
              <td><a href="edit_disc.php?id_disc=<?php echo $row["id_disc"]; ?>">Editar</a></td>
              <td><a href="delete2.php?id_disc=<?php echo $row["id_disc"]; ?>">Excluir</a></td>
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
