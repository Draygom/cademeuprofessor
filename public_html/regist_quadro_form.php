<!-- SELECIONA OS DADOS DA AULA PARA CADA DIA DA SEMANA -->
<div class="col-4">
<div class="card-body border my-1">
  <b><?php echo $dia ?></b>

  <!-- SELECIONA O DIA -->
  <input type="hidden" name="dia_<?php echo $dia ?>" value="<?php echo $dia ?>" />

  <!-- coleta o id do curso escolhido -->
  <?php
  $query = mysqli_query($con, "SELECT * FROM curso WHERE nome_curso = '$curso'")
  or die("<br>Erro: ".mysqli_error($con));
  while ($resultado = mysqli_fetch_array($query)) {
  ?>
  <input type="hidden" name="id_curso_<?php echo $dia ?>" value="<?php echo $resultado["id_curso"] ?>" />
<?php } ?>

  <?php  ?>
  <select class="custom-select my-1" required name="id_disc_<?php echo $dia ?>" id="disciplina">
    <option value="">-- Selecione a disciplina --</option>
    <option value="NE">-- NE --</option>
    <?php
    $query = mysqli_query($con, "SELECT disciplina.id_disc, disciplina.nome_disc FROM disciplina LEFT JOIN curso ON disciplina.curso_id_curso = curso.id_curso WHERE nome_curso = '$curso' ORDER BY nome_disc") or die("<br>Erro: ".mysqli_error($con));
    // Colocando os dados retornados pela consulta em um vetor $resultado
    while ($resultado = mysqli_fetch_array($query)) {
      ?>
  <option value="<?php echo $resultado["id_disc"] ?>"><?php echo $resultado["nome_disc"] ?></option>
  <?php
} // fim while
?>
  </select>

  <select class="custom-select" required name="id_prof_<?php echo $dia ?>" id="professor">
    <option value="">-- Selecione o professor --</option>
    <option value="NE">-- NE --</option>
    <?php
    $query = mysqli_query($con, "SELECT * FROM professor ORDER BY nome")
    or die("<br>Erro: ".mysqli_error($con));
    // Colocando os dados retornados pela consulta em um vetor $resultado
    while ($resultado = mysqli_fetch_array($query)) {
      ?>
  <option value="<?php echo $resultado["id_prof"] ?>"><?php echo $resultado["nome"] ?></option>
  <?php
} // fim while
?>
  </select>

  <select class="custom-select my-1" required name="id_sala_<?php echo $dia ?>" id="sala">
    <option value="">-- Selecione a sala --</option>
    <option value="NE">-- NE --</option>
    <?php
    $query = mysqli_query($con, "SELECT * FROM sala ORDER BY nome_sala")
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
