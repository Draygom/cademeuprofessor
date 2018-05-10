<?php
require("db.php");
include("menu.php");
?>
<title>Professores</title>
     <div class="container-fluid">
     <?php
     //tratando os erros
     error_reporting(E_ALL ^ E_NOTICE);
     // coletando o nome do curso
     $curso = $_GET["c"];
     // executando a consulta no banco de dados:
     $query = mysqli_query($con, "SELECT * FROM qr_tabela WHERE curso = '$curso' GROUP BY professor")
     or die("<br>Erro: ".mysqli_error($con));
     ?>
     <!-- mostra o nome do curso -->
     <h2 style="text-align:center;"><?php echo $curso;?></h2>
     <h5 style="text-align:center;"><b>Professores</b></h5>
        <?php
        // Colocando os dados retornados pela consulta em um vetor $resultado
        while ($resultado = mysqli_fetch_array($query)) {
        ?>
        <div class="btn-group-vertical col">
          <a href="exibe_sala.php?p=<?php echo $resultado["professor"]?>" class="btn btn-outline-light"  style="background-color:orange"><?php echo $resultado["professor"]?></a>
        </div>
          <?php
	       } // fim while
         ?>
  </div>
  <?php
  include("bottom.php");
  ?>
