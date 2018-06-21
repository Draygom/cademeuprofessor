<?php
require('dbcon.php'); //faz a conexão com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
include("auth.php"); //incluir o arquivo de autenticação em todas a paginas privadas
//pega o curso
$curso = $_GET["c"];
//seleciona todos os cursos cadastrados
$query = mysqli_query($con, "SELECT * FROM curso")
 or die("<br>Erro: ".mysqli_error($con));
?>
<title>Quadro de horários</title>

<div class="container-fluid">

  <div class="card">
    <nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
      <h5 class="text-white h4"><?php echo $curso ?></h5>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="regist_quadro.php?c=<?php echo $curso ?>">Cadastrar/Editar</a>
        </div>
      </div>
    </nav>

    <?php //seleciona o id da turma para criar uma tabela se tiverem aulas cadastradas para aquela turma
          $count = 1; // numero da turma
          $t_query = "SELECT id_turma FROM aula LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma" or die("<br>Erro: ".mysqli_error($con));
          $turma = mysqli_query($con, $t_query);
          while ($row = mysqli_fetch_assoc($turma)) {
            if ($row["id_turma"] == $count) {
              //se for encontrada uma turma com o id igual ao numero da turma ele da 'print' o quadro
            ?>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th><b>Turma <?php echo $row["id_turma"]?></b></th>
            <th class="text-center">
              Segunda-Feira<br>
            </th>
            <th class="text-center">
              Terça-Feira<br>
            </th>
            <th class="text-center">
              Quarta-Feira<br>
            </th>
            <th class="text-center">
              Quinta-Feira<br>
            </th>
            <th class="text-center">
              Sexta-Feira<br>
            </th>
            <th class="text-center">
              Sábado<br>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="text-nowrap" scope="row">Salas</th>
            <td>
              <?php $query = mysqli_query($con, "SELECT nome_sala, localizacao FROM aula
                LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                LEFT JOIN sala ON aula.sala_id_sala = sala.id_sala
                LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'segunda'")
               or die("<br>Erro: ".mysqli_error($con));
               $result = mysqli_fetch_array($query);
               if ($result <> "") {
                 ?> <a href="google.com/maps?q=<?php echo $result['localizacao']?>"><?php echo $result['nome_sala'];?></a>
              <?php } else echo "N/E"?>
            </td>
            <td>
              <?php $query = mysqli_query($con, "SELECT nome_sala, localizacao FROM aula
                LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                LEFT JOIN sala ON aula.sala_id_sala = sala.id_sala
                LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'terça'")
               or die("<br>Erro: ".mysqli_error($con));
               $result = mysqli_fetch_array($query);
               if ($result <> "") {
                 ?> <a href="google.com/maps?q=<?php echo $result['localizacao']?>"><?php echo $result['nome_sala'];?></a>
              <?php } else echo "N/E"?>
            </td>
            <td>
              <?php $query = mysqli_query($con, "SELECT nome_sala, localizacao FROM aula
                LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                LEFT JOIN sala ON aula.sala_id_sala = sala.id_sala
                LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'quarta'")
               or die("<br>Erro: ".mysqli_error($con));
               $result = mysqli_fetch_array($query);
               if ($result <> "") {
                 ?> <a href="google.com/maps?q=<?php echo $result['localizacao']?>"><?php echo $result['nome_sala'];?></a>
              <?php } else echo "N/E"?>
             </td>
            <td><?php $query = mysqli_query($con, "SELECT nome_sala, localizacao FROM aula
              LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
              LEFT JOIN sala ON aula.sala_id_sala = sala.id_sala
              LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
              WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'quinta'")
             or die("<br>Erro: ".mysqli_error($con));
             $result = mysqli_fetch_array($query);
             if ($result <> "") {
               ?> <a href="google.com/maps?q=<?php echo $result['localizacao']?>"><?php echo $result['nome_sala'];?></a>
            <?php } else echo "N/E"?>
           </td>
            <td><?php $query = mysqli_query($con, "SELECT nome_sala, localizacao FROM aula
              LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
              LEFT JOIN sala ON aula.sala_id_sala = sala.id_sala
              LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
              WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'sexta'")
             or die("<br>Erro: ".mysqli_error($con));
             $result = mysqli_fetch_array($query);
             if ($result <> "") {
               ?> <a href="google.com/maps?q=<?php echo $result['localizacao']?>"><?php echo $result['nome_sala'];?></a>
            <?php } else echo "N/E"?>
           </td>
           <td><?php $query = mysqli_query($con, "SELECT nome_sala, localizacao FROM aula
             LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
             LEFT JOIN sala ON aula.sala_id_sala = sala.id_sala
             LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
             WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'sábado'")
            or die("<br>Erro: ".mysqli_error($con));
            $result = mysqli_fetch_array($query);
            if ($result <> "") {
              ?> <a href="google.com/maps?q=<?php echo $result['localizacao']?>"><?php echo $result['nome_sala'];?></a>
           <?php } else echo "N/E"?>
          </td>
          </tr>
          <tr>
            <th class="text-nowrap" scope="row">Disciplinas</th>
            <td>
              <code>
                <?php $query = mysqli_query($con, "SELECT nome_disc FROM aula
                  LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                  LEFT JOIN disciplina ON aula.disciplina_id_disc = disciplina.id_disc
                  LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                  WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'segunda'")
                  or die("<br>Erro: ".mysqli_error($con));
                  $result = mysqli_fetch_array($query);
                  if ($result <> "") {
                    echo $result['nome_disc'];
                  } else echo "N/E"?>
                </code>
              </td>
            <td>
              <code>
                <?php $query = mysqli_query($con, "SELECT nome_disc FROM aula
                  LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                  LEFT JOIN disciplina ON aula.disciplina_id_disc = disciplina.id_disc
                  LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                  WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'terça'")
                  or die("<br>Erro: ".mysqli_error($con));
                  $result = mysqli_fetch_array($query);
                  if ($result <> "") {
                    echo $result['nome_disc'];
                  } else echo "N/E"?>
              </code>
            </td>
            <td>
              <code>
                <?php $query = mysqli_query($con, "SELECT nome_disc FROM aula
                  LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                  LEFT JOIN disciplina ON aula.disciplina_id_disc = disciplina.id_disc
                  LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                  WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'quarta'")
                  or die("<br>Erro: ".mysqli_error($con));
                  $result = mysqli_fetch_array($query);
                  if ($result <> "") {
                    echo $result['nome_disc'];
                  } else echo "N/E"?>
              </code>
            </td>
            <td>
              <code>
                <?php $query = mysqli_query($con, "SELECT nome_disc FROM aula
                  LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                  LEFT JOIN disciplina ON aula.disciplina_id_disc = disciplina.id_disc
                  LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                  WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'quinta'")
                  or die("<br>Erro: ".mysqli_error($con));
                  $result = mysqli_fetch_array($query);
                  if ($result <> "") {
                    echo $result['nome_disc'];
                  } else echo "N/E"?>
                </code>
              </td>
            <td>
              <code>
                <?php $query = mysqli_query($con, "SELECT nome_disc FROM aula
                  LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                  LEFT JOIN disciplina ON aula.disciplina_id_disc = disciplina.id_disc
                  LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                  WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'sexta'")
                  or die("<br>Erro: ".mysqli_error($con));
                  $result = mysqli_fetch_array($query);
                  if ($result <> "") {
                    echo $result['nome_disc'];
                  } else echo "N/E"?>
                </code>
              </td>
              <td>
                <code>
                  <?php $query = mysqli_query($con, "SELECT nome_disc FROM aula
                    LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                    LEFT JOIN disciplina ON aula.disciplina_id_disc = disciplina.id_disc
                    LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                    WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'sábado'")
                    or die("<br>Erro: ".mysqli_error($con));
                    $result = mysqli_fetch_array($query);
                    if ($result <> "") {
                      echo $result['nome_disc'];
                    } else echo "N/E"?>
                  </code>
                </td>
          </tr>
          <tr>
            <th class="text-nowrap" scope="row">Professores</th>
            <td>
              <?php $query = mysqli_query($con, "SELECT nome FROM aula
                LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
                LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'segunda'")
                or die("<br>Erro: ".mysqli_error($con));
                $result = mysqli_fetch_array($query);
                if ($result <> "") {
                  echo $result['nome'];
                } else echo "N/E"?>
            </td>
            <td>
              <?php $query = mysqli_query($con, "SELECT nome FROM aula
                LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
                LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'terça'")
                or die("<br>Erro: ".mysqli_error($con));
                $result = mysqli_fetch_array($query);
                if ($result <> "") {
                  echo $result['nome'];
                } else echo "N/E"?>
              </td>
            <td>
              <?php $query = mysqli_query($con, "SELECT nome FROM aula
                LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
                LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'quarta'")
                or die("<br>Erro: ".mysqli_error($con));
                $result = mysqli_fetch_array($query);
                if ($result <> "") {
                  echo $result['nome'];
                } else echo "N/E"?>
            </td>
            <td>
              <?php $query = mysqli_query($con, "SELECT nome FROM aula
                LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
                LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'quinta'")
                or die("<br>Erro: ".mysqli_error($con));
                $result = mysqli_fetch_array($query);
                if ($result <> "") {
                  echo $result['nome'];
                } else echo "N/E"?>
            </td>
            <td>
              <?php $query = mysqli_query($con, "SELECT nome FROM aula
                LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
                LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'sexta'")
                or die("<br>Erro: ".mysqli_error($con));
                $result = mysqli_fetch_array($query);
                if ($result <> "") {
                  echo $result['nome'];
                } else echo "N/E"?>
            </td>
            <td>
              <?php $query = mysqli_query($con, "SELECT nome FROM aula
                LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
                LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
                LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
                WHERE id_turma = '$count' AND nome_curso = '$curso' AND dia = 'sábado'")
                or die("<br>Erro: ".mysqli_error($con));
                $result = mysqli_fetch_array($query);
                if ($result <> "") {
                  echo $result['nome'];
                } else echo "N/E"?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  <?php //depois de imprimir o quadro ele adiciona mais 1 a contagem de turma, enquanto tiver turmas ele imprime o quadro
        //se não encontrar uma turma com o numero atual ele acrescenta mais 1 a contagem
    $count++; }else if ($row["id_turma"] >= $count) {
    $count++;
  } }?>
  </div>

</div>


<?php
include("bottom.php");
?>
