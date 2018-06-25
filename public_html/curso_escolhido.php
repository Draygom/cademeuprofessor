<?php
include ("menu.php");
$curso = $_GET["c"];
?>

<title><?php echo $curso;?></title>
   <div class="container-fluid">
     <h2 style="text-align:center;"><?php echo $curso;?></h2>
     <h5 style="text-align:center;"><b>Escolha uma opção de procura</b></h5>

     <div class="btn-group-vertical col">
       <a href="lista_disciplinas.php?c=<?php echo $curso?>" class="btn btn-outline-light rounded-0"  style="background-color:#ee7f22">DISCIPLINA</a>
       <a href="lista_professores.php?c=<?php echo $curso?>" class="btn btn-outline-light rounded-0"  style="background-color:#ee7f22">PROFESSOR</a>
     </div>
   </div>

<?php
include ("bottom.php");
?>
