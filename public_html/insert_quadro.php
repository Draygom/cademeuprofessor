<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1) {
  if(isset($_POST['id_disc_segunda']) && $_POST['id_disc_segunda']!=="NE") {
    $id_curso_segunda = $_REQUEST['id_curso_segunda'];
    $id_turma = $_REQUEST['id_turma'];
    $dia_segunda = $_REQUEST['dia_segunda'];
    $id_sala_segunda = $_REQUEST['id_sala_segunda'];
    $id_disc_segunda = $_REQUEST['id_disc_segunda'];
    $id_prof_segunda = $_REQUEST['id_prof_segunda'];
    $seg_query="INSERT INTO aula (turma_id_turma, sala_id_sala, disciplina_id_disc, curso_id_curso, professor_id_prof, dia) VALUES('$id_turma', '$id_sala_segunda', '$id_disc_segunda', '$id_curso_segunda', '$id_prof_segunda', '$dia_segunda')";
    mysqli_query($con, $seg_query) or die("<br> Erro: ".mysqli_error($con));
  }
  if(isset($_POST['id_disc_terça']) && $_POST['id_disc_terça']!=="NE") {
    $id_curso_terça = $_REQUEST['id_curso_terça'];
    $id_turma = $_REQUEST['id_turma'];
    $dia_terça = $_REQUEST['dia_terça'];
    $id_sala_terça = $_REQUEST['id_sala_terça'];
    $id_disc_terça = $_REQUEST['id_disc_terça'];
    $id_prof_terça = $_REQUEST['id_prof_terça'];
    $ter_query="INSERT INTO aula (turma_id_turma, sala_id_sala, disciplina_id_disc, curso_id_curso, professor_id_prof, dia) VALUES('$id_turma', '$id_sala_terça', '$id_disc_terça', '$id_curso_terça', '$id_prof_terça', '$dia_terça')";
    mysqli_query($con, $ter_query) or die("<br> Erro: ".mysqli_error($con));
  }
  if(isset($_POST['id_disc_quarta']) && $_POST['id_disc_quarta']!=="NE") {
    $id_curso_quarta = $_REQUEST['id_curso_quarta'];
    $id_turma = $_REQUEST['id_turma'];
    $dia_quarta = $_REQUEST['dia_quarta'];
    $id_sala_quarta = $_REQUEST['id_sala_quarta'];
    $id_disc_quarta = $_REQUEST['id_disc_quarta'];
    $id_prof_quarta = $_REQUEST['id_prof_quarta'];
    $qua_query="INSERT INTO aula (turma_id_turma, sala_id_sala, disciplina_id_disc, curso_id_curso, professor_id_prof, dia) VALUES('$id_turma', '$id_sala_quarta', '$id_disc_quarta', '$id_curso_quarta', '$id_prof_quarta', '$dia_quarta')";
    mysqli_query($con, $qua_query) or die("<br> Erro: ".mysqli_error($con));
  }
  if(isset($_POST['id_disc_quinta']) && $_POST['id_disc_quinta']!=="NE") {
    $id_curso_quinta = $_REQUEST['id_curso_quinta'];
    $id_turma = $_REQUEST['id_turma'];
    $dia_quinta = $_REQUEST['dia_quinta'];
    $id_sala_quinta = $_REQUEST['id_sala_quinta'];
    $id_disc_quinta = $_REQUEST['id_disc_quinta'];
    $id_prof_quinta = $_REQUEST['id_prof_quinta'];
    $qui_query="INSERT INTO aula (turma_id_turma, sala_id_sala, disciplina_id_disc, curso_id_curso, professor_id_prof, dia) VALUES('$id_turma', '$id_sala_quinta', '$id_disc_quinta', '$id_curso_quinta', '$id_prof_quinta', '$dia_quinta')";
    mysqli_query($con, $qui_query) or die("<br> Erro: ".mysqli_error($con));
  }
  if(isset($_POST['id_disc_sexta']) && $_POST['id_disc_sexta']!=="NE") {
    $id_curso_sexta = $_REQUEST['id_curso_sexta'];
    $id_turma = $_REQUEST['id_turma'];
    $dia_sexta = $_REQUEST['dia_sexta'];
    $id_sala_sexta = $_REQUEST['id_sala_sexta'];
    $id_disc_sexta = $_REQUEST['id_disc_sexta'];
    $id_prof_sexta = $_REQUEST['id_prof_sexta'];
    $sex_query="INSERT INTO aula (turma_id_turma, sala_id_sala, disciplina_id_disc, curso_id_curso, professor_id_prof, dia) VALUES('$id_turma', '$id_sala_sexta', '$id_disc_sexta', '$id_curso_sexta', '$id_prof_sexta', '$dia_sexta')";
    mysqli_query($con, $sex_query) or die("<br> Erro: ".mysqli_error($con));
  }
  if(isset($_POST['id_disc_sábado']) && $_POST['id_disc_sábado']!=="NE") {
    $id_curso_sábado = $_REQUEST['id_curso_sábado'];
    $id_turma = $_REQUEST['id_turma'];
    $dia_sábado = $_REQUEST['dia_sábado'];
    $id_sala_sábado = $_REQUEST['id_sala_sábado'];
    $id_disc_sábado = $_REQUEST['id_disc_sábado'];
    $id_prof_sábado = $_REQUEST['id_prof_sábado'];
    $sab_query="INSERT INTO aula (turma_id_turma, sala_id_sala, disciplina_id_disc, curso_id_curso, professor_id_prof, dia) VALUES('$id_turma', '$id_sala_sábado', '$id_disc_sábado', '$id_curso_sábado', '$id_prof_sábado', '$dia_sábado')";
    mysqli_query($con, $sab_query) or die("<br> Erro: ".mysqli_error($con));
  }
$status = "Novo cadastro inserido com sucesso.";
}
?>
