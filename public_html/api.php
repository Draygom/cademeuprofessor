<?php
header("Content-Type:application/json");
if (isset($_GET['id_aula']) && $_GET['id_aula']!="") {
	include('dbcon.php');
	$id_aula = $_GET['id_aula'];
	$result = mysqli_query($con,
	"SELECT id_aula, dia, turma.periodo, sala.nome_sala, disciplina.nome_disc, professor.nome, curso.nome_curso FROM `aula`
	LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
	LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
	LEFT JOIN disciplina ON aula.disciplina_id_disc = disciplina.id_disc
	LEFT JOIN sala ON aula.sala_id_sala = sala.id_sala
	LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
	WHERE id_aula=$id_aula");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$dia = $row['dia'];
	$periodo = $row['periodo'];
	$nome_curso = $row['nome_curso'];
	$nome_disc = $row['nome_disc'];
	$nome = $row['nome'];
	$nome_sala = $row['nome_sala'];
	response($id_aula, $dia, $periodo, $nome_curso, $nome_disc, $nome, $nome_sala);
	mysqli_close($con);
	}else{
		response(NULL, NULL, NULL, NULL, NULL, NULL, NULL);
		}
}else{
	response(NULL, NULL, NULL, NULL, NULL, NULL, NULL);
	}

function response($id_aula, $dia, $periodo, $nome_curso, $nome_disc, $nome, $nome_sala){
	$response['id_aula'] = $id_aula;
	$response['dia'] = $dia;
	$response['periodo'] = $periodo;
	$response['nome_curso'] = $nome_curso;
	$response['nome_disc'] = $nome_disc;
	$response['nome'] = $nome;
	$response['nome_sala'] = $nome_sala;

	$json_response = json_encode($response);
	echo $json_response;
}
?>
