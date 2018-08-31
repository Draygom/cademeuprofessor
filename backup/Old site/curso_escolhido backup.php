<html>
<head>
	<title>Curso</title>
 <body>


<center>escolha uma opção de procura</center>
<?php

$curso = $_GET["c"];

?>

<div>

<a href="qr_listas/lista_professores.php?c=<?php echo $curso?>">PROFESSOR</a>
<a href="qr_listas/lista_disciplinas.php?c=<?php echo $curso?>">DISCIPLINA</a>

</div>

 </body>

</html>