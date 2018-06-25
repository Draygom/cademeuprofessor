<?php
require('dbcon.php');
include("menu.php");
include("auth.php");
$id_aula=$_REQUEST['id_aula'];
$query = "SELECT id_aula, dia, turma.periodo, sala.nome_sala, disciplina.nome_disc, professor.nome, curso.nome_curso FROM aula
LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
LEFT JOIN disciplina ON aula.disciplina_id_disc = disciplina.id_disc
LEFT JOIN sala ON aula.sala_id_sala = sala.id_sala
LEFT JOIN turma ON aula.turma_id_turma = turma.id_turma
WHERE id_aula='".$id_aula."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<title>Editar Aula</title>

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id_aula=$_REQUEST['id_aula'];
$dia=$_REQUEST['dia'];
$id_disc=$_REQUEST['disciplina_id_disc'];
$id_prof=$_REQUEST['professor_id_prof'];
$id_sala=$_REQUEST['sala_id_sala'];
$update="UPDATE aula SET dia='".$dia."', disciplina_id_disc='".$id_disc."', professor_id_prof='".$id_prof."', sala_id_sala='".$id_sala."' WHERE id_aula='".$id_aula."' ";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Cadastro atualizado com sucesso.";
echo '<div class="alert alert-success">'.$status.'</div>';
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=regist_quadro.php?c='.$row['nome_curso'].'">';
}else {
?>
<div class="container-fluid">
  <div class="card">
    <div class="card-body ">
      <h2>Editar aula n° <?php echo $id_aula ?>, Curso: <?php echo $row['nome_curso']; ?>, Turma: <?php echo $row['periodo']; ?> </h2>
      <form name="form" method="post" action="">
        <input type="hidden" name="new" value="1" />
        <div class="form-group row">
          <div class="col-10 col-sm-4">
            <label for="Dia" class="col-form-label"><b>Dia: </b><?php echo $row['dia'];?></label>
            <select class="custom-select my-1" required name="dia" id="dia">
              <option >-- Selecione o dia --</option>
              <option value="segunda">Segunda</option>
              <option value="terça">Terça</option>
              <option value="quarta">Quarta</option>
              <option value="quinta">Quinta</option>
              <option value="sexta">Sexta</option>
              <option value="sabado">Sábado</option>
            </select>

            <label for="Disciplina" class="col-form-label"><b>Disciplina: </b><?php echo $row['nome_disc'];?></label>
            <select class="custom-select my-1" required name="disciplina_id_disc" id="disciplina">
              <option >-- Selecione a disciplina --</option>
              <option value="NE">-- NE --</option>
              <?php
              $query = mysqli_query($con, "SELECT * FROM disciplina")
              or die("<br>Erro: ".mysqli_error($con));
              // Colocando os dados retornados pela consulta em um vetor $resultado
              while ($resultado = mysqli_fetch_array($query)) {
                ?>
            <option value="<?php echo $resultado["id_disc"] ?>"><?php echo $resultado["nome_disc"] ?></option>
            <?php
          } // fim while
          ?>
            </select>
          </div>

          <div class="col-10 col-sm-4">
            <label for="Professor" class="col-form-label"><b>Professor: </b><?php echo $row['nome'];?></label>
            <select class="custom-select my-1" required name="professor_id_prof" id="professor">
              <option value="">-- Selecione o professor --</option>
              <option value="NE">-- NE --</option>
              <?php
              $query = mysqli_query($con, "SELECT * FROM professor")
              or die("<br>Erro: ".mysqli_error($con));
              // Colocando os dados retornados pela consulta em um vetor $resultado
              while ($resultado = mysqli_fetch_array($query)) {
                ?>
            <option value="<?php echo $resultado["id_prof"] ?>"><?php echo $resultado["nome"] ?></option>
            <?php
          } // fim while
          ?>
            </select>
          </div>

          <div class="col-10 col-sm-4">
            <label for="Sala" class="col-form-label"><b>Sala: </b><?php echo $row['nome_sala'];?></label>
            <select class="custom-select my-1" required name="sala_id_sala" id="sala">
              <option >-- Selecione a sala --</option>
              <option value="NE">-- NE --</option>
              <?php
              $query = mysqli_query($con, "SELECT * FROM sala")
              or die("<br>Erro: ".mysqli_error($con));
              // Colocando os dados retornados pela consulta em um vetor $resultado
              while ($resultado = mysqli_fetch_array($query)) {
                ?>
            <option value="<?php echo $resultado["id_sala"] ?>"><?php echo $resultado["nome_sala"] ?></option>
            <?php
          } // fim while
          ?>
            </select>
          </div>
        </div>
        <input name="submit" class="btn btn-warning my-1" type="submit" value="Editar" /> <button type="button" class="btn btn-warning" onClick="history.go(-1)">Voltar</button>
      </form>
      <?php } ?>
    </div>
  </div>
</div>

<?php
include("bottom.php");
?>
