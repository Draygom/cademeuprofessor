<?php
require("dbcon.php");
include("menu.php");
?>
<title>Sugestões</title>
<div class="container-fluid">

  <div class="card">
    <div class="card-body">
      <h3 class="display-5" style="text-align:center; color:#626262;">Enviar Sugestão</h3>

      <?php include("insert_sugestoes.php"); ?>
      <form name="form" method="post" action="">
        <div class="form-group">
          <input type="hidden" name="new" value="1" />

          <label for="titulo">Nome:</label>
          <input for="titulo" type="titulo" class="form-control my-1" placeholder="Por favor informe o seu nome" name="titulo" required />
        
          <label for="sugestoes">Sugestão:</label>
          <textarea for="sugestoes" rows="3" type="sugestoes" class="form-control" id="forms" placeholder="Sugestão" name="sugestoes" required></textarea>
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
