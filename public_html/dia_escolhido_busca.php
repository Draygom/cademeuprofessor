<?php
if ($professor <> ""){
   // executando a consulta no banco de dados:
    $query = mysqli_query($con, "SELECT nome, nome_disc, nome_curso, nome_sala, localizacao, dia, periodo FROM aula
      LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
      LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
      LEFT JOIN disciplina ON aula.disciplina_id_disc = disciplina.id_disc
      LEFT JOIN sala ON aula.sala_id_sala = sala.id_sala
      LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
      WHERE nome = '$professor' AND dia = '$dia_escolhido'")
     or die("<br>Erro: ".mysqli_error($con));
   }

if ($disciplina <> ""){
      // executando a consulta no banco de dados:
       $query = mysqli_query($con, "SELECT nome, nome_disc, nome_curso, nome_sala, localizacao, dia, periodo FROM aula
         LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
         LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
         LEFT JOIN disciplina ON aula.disciplina_id_disc = disciplina.id_disc
         LEFT JOIN sala ON aula.sala_id_sala = sala.id_sala
         LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
         WHERE nome_disc = '$disciplina' AND dia = '$dia_escolhido'")
        or die("<br>Erro: ".mysqli_error($con));
      }
       // Colocando os dados retornados pela consulta em um vetor $resultado
$qt_registros =  mysqli_affected_rows($con);

if ($qt_registros == 0){
        ?>
        <div class="alert alert-danger" style="margin-left:1%;margin-right:1%">Não há registro dessa aula para esse dia</div>
<?php
    }
?>
 <div class="container-fluid">
<?php
   while ($resultado = mysqli_fetch_array($query)) {
?>
  <!-- Exibe a tabela com professor, sala e curso no dia em questao  -->
  <table class="table">
    <h5 class="display-5" style="text-align:center;"><?php echo $resultado["nome_curso"] ?> - Turma do <?php echo  $resultado["periodo"] ?></h5>
    <thead>
    <tr>
       <th>Professor</th>
       <th>Sala</th>
       <th>Disciplina</th>
    </tr>
    </thead>

    <tbody>
    <tr>
       <td><?php echo $resultado["nome"]?></td>
       <td><a href="https://www.google.com/maps?q=<?php echo $resultado['localizacao']?>" target="_blank" class="btn btn-outline-light rounded-0"  style="background-color:#ee7f22"><?php echo $resultado['nome_sala'];?></a></td>
       <td><?php echo $resultado["nome_disc"]?></td>
    </tr>
    </tbody>
<?php
  } // fim while
?>
</table>

</div>
