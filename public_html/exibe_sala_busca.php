<?php
require("dbcon.php");
include("menu.php");
?>
    <title>Sala</title>
     <?php
     // tratando os erros
     error_reporting(E_ALL ^ E_NOTICE);
     // recebendo o nome do professor
     $professor = $_GET["p"];
     // recebendo o nome da disciplina
     $disciplina = $_GET["d"];
     // Array com os dias da semana
     $diasemana = array('domingo', 'segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sabado');
     // Dia atual:
     $data = date('Y-m-d');
     // Variavel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
     $diasemana_numero = date('w', strtotime($data));
     // Exibe o dia da semana com o Array
     $hoje = $diasemana[$diasemana_numero];

     if ($professor <> ""){
	      // executando a consulta no banco de dados:
	       $query = mysqli_query($con, "SELECT nome, nome_disc, nome_curso, nome_sala, localizacao, dia, periodo FROM aula
           LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
           LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
           LEFT JOIN disciplina ON aula.disciplina_id_disc = disciplina.id_disc
           LEFT JOIN sala ON aula.sala_id_sala = sala.id_sala
           LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
           WHERE nome = '$professor' AND dia = '$hoje'")
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
              WHERE nome_disc = '$disciplina' AND dia = '$hoje'")
	           or die("<br>Erro: ".mysqli_error($con));
           }
           // Colocando os dados retornados pela consulta em um vetor $resultado
    $qt_registros =  mysqli_affected_rows($con);
    ?>

    <div class="col-sm-12">

    <?php //caso não tenha aula cadastrada no dia em que se faz a busca
    if ($qt_registros == 0){
    ?>
      <div class="alert alert-danger">Não há registro dessa aula para hoje</div>

    <?php
        }
    ?>

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
    <!-- Botão de voltar -->
    </table>
    <button type="button" class="btn btn-block rounded-0" style="background-color:#ee7f22" onClick="history.go(-1)">&larr; Voltar</button>
    </div>

    <!-- Exibe a lista com os outros dias da semana -->
    <div class="col-sm-12" style="color:#a6a6a6">
       Veja abaixo as aulas desse professor em outros dias da semana
    </div>

  <div class="col-sm-12" style="margin-top:1%">

  <div id="accordion">

  <button style="margin-top:2px;margin-bottom:2px;border-radius: 50px;width:15.4%;margin-right:0.1%;background-color:#ee7f22" type="button" class="btn" data-toggle="collapse" data-target="#segunda">Seg</button>
  <button style="margin-top:2px;margin-bottom:2px;border-radius: 50px;width:15.4%;margin-right:0.1%;background-color:#ee7f22" type="button" class="btn" data-toggle="collapse" data-target="#terça">Ter</button>
  <button style="margin-top:2px;margin-bottom:2px;border-radius: 50px;width:15.4%;margin-right:0.1%;background-color:#ee7f22" type="button" class="btn" data-toggle="collapse" data-target="#quarta">Qua</button>
  <button style="margin-top:2px;margin-bottom:2px;border-radius: 50px;width:15.4%;margin-right:0.1%;background-color:#ee7f22" type="button" class="btn" data-toggle="collapse" data-target="#quinta">Qui</button>
  <button style="margin-top:2px;margin-bottom:2px;border-radius: 50px;width:15.4%;margin-right:0.1%;background-color:#ee7f22" type="button" class="btn" data-toggle="collapse" data-target="#sexta">Sex</button>
  <button style="margin-top:2px;margin-bottom:2px;border-radius: 50px;width:15.4%;background:#ff471a;border:#ff471a;color:white;" type="button" class="btn btn-warning " data-toggle="collapse" data-target="#sabado">Sáb</button>

  <div id="segunda" class="collapse" data-parent="#accordion">
    <div class="col-sm-12" style="margin-bottom:1%;margin-top:1%;padding-left:0px;padding-right:0px">
      <div class="col-sm-12" style="text-align:center;background-color:#ee7f22;color:white;">
        <h5>Segunda</h5>
      </div>
      <?php $dia_escolhido = 'segunda'; include("dia_escolhido_busca.php");?>
    </div>
  </div>

  <div id="terça" class="collapse" data-parent="#accordion">
    <div class="col-sm-12" style="margin-bottom:1%;margin-top:1%;padding-left:0px;padding-right:0px">
      <div class="col-sm-12" style="text-align:center;background-color:#ee7f22;color:white;">
        <h5>Terça</h5>
      </div>
      <?php $dia_escolhido = 'terça'; include("dia_escolhido_busca.php");?>
    </div>
  </div>

  <div id="quarta" class="collapse" data-parent="#accordion">
    <div class="col-sm-12" style="margin-bottom:1%;margin-top:1%;padding-left:0px;padding-right:0px">
      <div class="col-sm-12" style="text-align:center;background-color:#ee7f22;color:white;">
        <h5>Quarta</h5>
      </div>
      <?php $dia_escolhido = 'quarta'; include("dia_escolhido_busca.php");?>
    </div>
  </div>

  <div id="quinta" class="collapse" data-parent="#accordion">
    <div class="col-sm-12" style="margin-bottom:1%;margin-top:1%;padding-left:0px;padding-right:0px">
      <div class="col-sm-12" style="text-align:center;background-color:#ee7f22;color:white;">
        <h5>Quinta</h5>
      </div>
      <?php $dia_escolhido = 'quinta'; include("dia_escolhido_busca.php");?>
    </div>
  </div>

  <div id="sexta" class="collapse" data-parent="#accordion">
    <div class="col-sm-12" style="margin-bottom:1%;margin-top:1%;padding-left:0px;padding-right:0px">
      <div class="col-sm-12" style="text-align:center;background-color:#ee7f22;color:white;">
        <h5>Sexta</h5>
      </div>
      <?php $dia_escolhido = 'sexta'; include("dia_escolhido_busca.php");?>
    </div>
  </div>

  <div id="sabado" class="collapse" data-parent="#accordion">
    <div class="col-sm-12" style="margin-bottom:1%;margin-top:1%;padding-left:0px;padding-right:0px">
      <div class="col-sm-12" style="text-align:center;background-color:#ff471a;color:white;">
        <h5>Sábado</h5>
      </div>
      <?php $dia_escolhido = 'sabado'; include("dia_escolhido_busca.php");?>
    </div>
  </div>
</div>
</div>

<?php
include("bottom.php");
?>
