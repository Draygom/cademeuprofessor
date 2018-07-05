<?php
require("dbcon.php");
include("menu.php");
include("auth.php"); //include auth.php file on all secure pages
?>
<title>Bem Vindo!</title>
<div class="container-fluid">
  <h3 class="display-5" style="text-align:center; color:#626262;">Bem Vindo, <?php echo $_SESSION['apelido']; ?>!</h3>

  <div class="col col-sm-5">
    <div class="card" id="sugestões">
      <div class="card-header">
      Sugestões
      </div>
      <?php //mostra sugestões
      $query = mysqli_query($con, "SELECT id, titulo, data_lido FROM tb_sugestoes WHERE data_lido = '0000-00-00' ") or die ("<br>Erro: ".mysqli_error($con));
      $qt_registros =  mysqli_affected_rows($con);
      if ($qt_registros == 0) {
        ?><ul class="list-group list-group-flush">
            <li class="list-group-item">Não há sugestões novas</li>
          </ul>
        <?php }
      $sel_query = "SELECT id, titulo, data_lido FROM tb_sugestoes WHERE data_lido = '0000-00-00' ";
      $result = mysqli_query($con, $sel_query);
      while($row = mysqli_fetch_assoc($result)) { ?>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <a href="sugestoes.php?id=<?php echo $row["id"] ?>&&l=n" class="card-link">Sugestão de <?php echo $row["titulo"] ?></a>
          </li>
        </ul>
      <?php } ?>
      <div class="card-body">
        <a href="sugestoes.php?id=&&l=listar" class="btn btn-block btn-light border">Mostrar Todas</a>
      </div>
    </div>
  </div>

</div>
<?php
include("bottom.php");
?>
