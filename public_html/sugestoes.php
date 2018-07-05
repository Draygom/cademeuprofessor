<?php
require("dbcon.php");
include("menu.php");
include("auth.php"); //include auth.php file on all secure pages
$id = $_GET["id"];
$lista = $_GET["l"];
?>
<title>Sugestões</title>
<div class="container-fluid">
  <?php if ($lista !== "listar"){
    $sel_query = "SELECT titulo, sugestoes, data_envio, data_lido FROM tb_sugestoes WHERE id = '$id' ";
    $result = mysqli_query($con, $sel_query);
    $row = mysqli_fetch_assoc($result);
    $data_lido = date("Y-m-d H:i:s");
    $update = "UPDATE tb_sugestoes SET data_lido = '".$data_lido."' WHERE id = '".$id."'";
    mysqli_query($con, $update) or die("<br> Erro: ".mysqli_error($con)); ?>
    <div class="card">
      <div class="card-header">
        Sugestão de <?php echo $row["titulo"] ?>
      </div>
      <div class="card-body">
        <p class="card-text"><?php echo $row["sugestoes"] ?></p>
      </div>
    </div>


    <?php //registra que foi lido
    if(isset($_POST['new']) && $_POST['new']==1) {
      $data_lido = "0000-00-00";
      $update = "UPDATE tb_sugestoes SET data_lido = '".$data_lido."' WHERE id = '".$id."'";
      mysqli_query($con, $update) or die("<br> Erro: ".mysqli_error($con));
      echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=user.php">'; // redireciona pra pagina inicial do usuario
    }
    ?>
    <form name="registration" action="" method="post">
      <input type="hidden" name="new" value="1" />
      <input type="submit" class="btn btn-block my-2" name="submit" value="Marcar como não lido" />
      <button type="button" class="btn btn-block" onClick="history.go(-1)">Voltar</button>
    </form>
  <?php } else { ?>
    <div class="card">
      <div class="card-body">
        <h2>Sugestões enviadas</h2>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Enviado por</th>
              <th>Data do envio</th>
              <th>Data da leitura</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $count=1;
            $sel_query = "SELECT id, titulo, sugestoes, data_envio, data_lido FROM tb_sugestoes";
            $result = mysqli_query($con, $sel_query);
            while($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><a href="sugestoes.php?id=<?php echo $row["id"] ?>&&l=n" class="card-link"><?php echo $row["titulo"] ?></td>
                <td><?php echo $row["data_envio"]?></td>
                <td><?php echo $row["data_lido"]?></td>
              </tr>
              <?php
              $count++;
            }?>
          </tbody>
        </table>
      </div>
    </div>
  <?php } ?>

</div>
<?php
include("bottom.php");
?>
