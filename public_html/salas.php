<?php
require("dbcon.php"); //conecta com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
?>
<title>Salas</title>
<?php
//tratando os erros
error_reporting(E_ALL ^ E_NOTICE);

$query = mysqli_query($con, "SELECT * FROM sala ORDER BY nome_sala")
or die("<br>Erro: ".mysqli_error($con));
?>
   <div class="container-fluid">
     <a href="index.php"> <img src="imagens/logo.png" class="img-fluid" alt="Logo"></a>
     <h5 class="display-5" style="text-align:center; color:gray;"><b>Localize sua sala</b></h5>
     <center>
       <div class="btn-group-vertical col">
         <?php
         // Colocando os dados retornados pela consulta em um vetor $resultado
         while ($resultado = mysqli_fetch_array($query)) {
           ?>
           <a href="https://www.google.com/maps?q=<?php echo $resultado['localizacao']?>" class="btn btn-outline-light rounded-0"  style="background-color:#ee7f22" ><?php echo $resultado["nome_sala"] ?></a>
           <?php
         } // fim while
         ?>
       </div>
       <p>
     </center>
   </div>
<?php
include("bottom.php");
?>
