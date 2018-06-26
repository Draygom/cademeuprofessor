<?php
include ("menu.php");
$curso = $_GET["c"];
?>

<title><?php echo $curso;?></title>
   <div class="container-fluid">
     <h3 class="display-5" style="text-align:center; color:#626262;"><?php echo $curso;?></h3>
     <h5 class="display-5" style="text-align:center; color:#949494;"><b>Escolha uma opção de procura</b></h5>
      <!-- Lista as opções de procura -->
     <div class="btn-group-vertical col">
       <a href="lista_disciplinas.php?c=<?php echo $curso?>" class="btn btn-outline-light rounded-0"  style="background-color:#ee7f22">DISCIPLINA</a>
       <a href="lista_professores.php?c=<?php echo $curso?>" class="btn btn-outline-light rounded-0"  style="background-color:#ee7f22">PROFESSOR</a>
     </div>
   </div>

<?php
include ("bottom.php");
?>
