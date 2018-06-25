<?php
require('dbcon.php'); //faz a conexão com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
include("auth.php"); //incluir o arquivo de autenticação em todas a paginas privadas
//pega o curso
$curso = $_GET["c"];
?>
<title>Cursos</title>

<div class="container-fluid">
  <div class="card my-1">
    <div class="card-body">
      <?php Include("insert_quadro.php"); //codigo de cadastro ?>
      <h1>Cadastrar novo quadro para <?php echo $curso ?></h1>
      <form name="form" method="post" action="">
        <div class="form-group form-row">
          <div class="col-sm">
            <input type="hidden" name="new" value="1" />
            <!-- SELECIONA TURMA -->
            <select class="custom-select my-1" required name="id_turma" id="turma">
              <option value="">-- Selecione a turma --</option>
              <?php
              $query = mysqli_query($con, "SELECT * FROM turma")
              or die("<br>Erro: ".mysqli_error($con));
              // Colocando os dados retornados pela consulta em um vetor $resultado
              while ($resultado = mysqli_fetch_array($query)) {
                ?>
            <option value="<?php echo $resultado["id_turma"] ?>"><?php echo $resultado["periodo"] ?></option>
            <?php
          } // fim while
          ?>
            </select>

            <!-- FORM QUE SELECIONA OS DADOS DA AULA PARA CADA DIA DA SEMANA -->
            <div class="form-row" role="group" aria-label="Grupo do formulario">
              <?php
              $dia = "segunda"; include("regist_quadro_form.php");
              $dia = "terça"; include("regist_quadro_form.php");
              $dia = "quarta"; include("regist_quadro_form.php");
              $dia = "quinta"; include("regist_quadro_form.php");
              $dia = "sexta"; include("regist_quadro_form.php");
              $dia = "sabado"; include("regist_quadro_form.php");
              ?>
            </div>

          </div>
        </div>
        <input class="btn btn-warning my-1" name="submit" type="submit" value="Enviar" /> <button type="button" class="btn btn-warning" onClick="history.go(-1)">Voltar</button>
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
      <h2>Aulas cadastradas</h2>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>COD.</th>
            <th>Turma</th>
            <th>Dia</th>
            <th>Sala</th>
            <th>Disciplina</th>
            <th>Professor</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>

          <?php
          $count=1;
          $sel_query="SELECT id_aula, dia, turma.periodo, sala.nome_sala, disciplina.nome_disc, professor.nome, curso.nome_curso FROM aula
          LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
          LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
          LEFT JOIN disciplina ON aula.disciplina_id_disc = disciplina.id_disc
          LEFT JOIN sala ON aula.sala_id_sala = sala.id_sala
          LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
          WHERE nome_curso = '$curso'
          ORDER BY id_aula desc;";
          $result = mysqli_query($con, $sel_query);
          while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $row["periodo"]?></td>
              <td><?php echo $row["dia"]?></td>
              <td><?php echo $row["nome_sala"]?></td>
              <td><?php echo $row["nome_disc"]?></td>
              <td><?php echo $row["nome"]?></td>
              <td><a href="edit_aula.php?id_aula=<?php echo $row["id_aula"]; ?>">Editar</a></td>
              <td><a href="delete.php?id_aula=<?php echo $row["id_aula"]; ?>">Excluir</a></td>
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
