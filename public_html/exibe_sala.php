<?php
require("db.php");
include("menu.php");
?>
    <title>Sala</title>
     <?php
     // tratando os erros
     error_reporting(E_ALL ^ E_NOTICE);
     // recebendo o nome do professor
     $professor = $_GET["p"];
     // recebendo o nome da disciplina
     $disciplina = $_GET["d"];
     // Array com os dias da semana
     $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
     // Dia atual:
     $data = date('Y-m-d');
     // Variavel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
     $diasemana_numero = date('w', strtotime($data));
     // Exibe o dia da semana com o Array
     $hoje = $diasemana[$diasemana_numero];

     if ($professor <> ""){
	      // executando a consulta no banco de dados:
	       $query = mysqli_query($con, "SELECT * FROM qr_tabela WHERE professor = '$professor' AND dia = '$hoje' GROUP BY professor")
	        or die("<br>Erro: ".mysqli_error($con));
        }

     if ($disciplina <> ""){
	         // executando a consulta no banco de dados:
	          $query = mysqli_query($con, "SELECT * FROM qr_tabela WHERE disciplina = '$disciplina' AND dia = '$hoje' GROUP BY professor")
	           or die("<br>Erro: ".mysqli_error($con));
           }
           // Colocando os dados retornados pela consulta em um vetor $resultado
$qt_registros =  mysqli_affected_rows($con);

if ($qt_registros == 0){
        ?>
        <div class="alert alert-danger">Não há registro dessa aula para hoje</div>
        <button type="button" class="btn btn-block btn-warning" onClick="history.go(-1)">Voltar</button>
<?php exit;
    }
           ?>
  <div class="container-fluid">
  <table class="table table-light">
    <thead>
    <tr>
	     <th>Professor</th>
	     <th>Sala</th>
	     <th>Disciplina</th>
    </tr>
    </thead>
<?php

while ($resultado = mysqli_fetch_array($query)) {
	?>
    <h5 style="text-align:center"><?php echo $resultado["curso"] ?></h5>
    <tbody>
    <tr>
	     <td><?php echo $resultado["professor"]?></td>
	     <td><?php echo $resultado["sala"]?></td>
	     <td><?php echo $resultado["disciplina"]?></td>
    </tr>
    </tbody>
<?php
	} // fim while
?>
    </table>
    <button type="button" class="btn btn-block btn-warning" onClick="history.go(-1)">Voltar</button>
  </div>
<?php
include("bottom.php");
?>
