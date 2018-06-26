<?php
require("dbcon.php");
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
     $query = mysqli_query($con, "SELECT * FROM aula
       LEFT JOIN professor ON aula.professor_id_prof = professor.id_prof
       LEFT JOIN curso ON aula.curso_id_curso = curso.id_curso
       WHERE nome_curso = '$curso' GROUP BY nome")
     or die("<br>Erro: ".mysqli_error($con));
     ?>
     <!-- mostra o nome do curso -->
     <h3 class="display-5" style="text-align:center; color:#626262;"><?php echo $curso;?></h3>
     <h5 class="display-5" style="text-align:center; color:#949494;"><b>Professores</b></h5>
        <?php
        // Colocando os dados retornados pela consulta em um vetor $resultado
        while ($resultado = mysqli_fetch_array($query)) {
        ?>
        <div class="btn-group-vertical col">
          <a href="exibe_sala.php?p=<?php echo $resultado["nome"]?>" class="btn btn-outline-light rounded-0"  style="background-color:#ee7f22"><?php echo $resultado["nome"]?></a>
        </div>
          <?php
	       } // fim while
         ?>
  </div>
  
  <?php
  include("bottom.php");
  ?>
