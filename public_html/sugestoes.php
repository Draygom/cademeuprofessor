<?php
require("dbcon.php");
include("menu.php");
?>
<title>Sugestões</title>
<div class="container-fluid">

  <div class="card">
    <div class="card-body">
      <h3>Enviar Sugestão</h3>

      <?php include("insert_sugestoes.php"); ?>
      <form name="form1" action="" method="POST">
        <input type="hidden" name="new" value="1" />

        <div class="form-group">
          <label for="titulo">Nome:</label>
          <input for="titulo" type="titulo" class="form-control" id="forms" placeholder="Por favor informe o seu nome" name="titulo">
        </div>

        <div class="form-group">
          <label for="sugestoes">Sugestão:</label>
          <textarea for="sugestoes" rows="3" type="sugestoes" class="form-control" id="forms" placeholder="Sugestão" name="sugestoes"></textarea>
        </div>

        <button type="submit" class="btn btn-warning">Enviar</button>
      </form>

      <?php
      if($status !== ""){
        echo '<div class="alert alert-success alert-dismissible fade show">' .$status. '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>';
      }?>

    </div>
  </div>
</div>
<?php
include("bottom.php");
?>
