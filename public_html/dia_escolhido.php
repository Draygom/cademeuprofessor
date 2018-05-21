<?php
 if ($professor <> ""){
    // executando a consulta no banco de dados:
     $query = mysqli_query($con, "SELECT * FROM qr_tabela WHERE professor = '$professor' AND dia = '$dia_escolhido' GROUP BY professor")
      or die("<br>Erro: ".mysqli_error($con));
    }

 if ($disciplina <> ""){
       // executando a consulta no banco de dados:
        $query = mysqli_query($con, "SELECT * FROM qr_tabela WHERE disciplina = '$disciplina' AND dia = '$dia_escolhido' GROUP BY professor")
         or die("<br>Erro: ".mysqli_error($con));
       }
       // Colocando os dados retornados pela consulta em um vetor $resultado
$qt_registros =  mysqli_affected_rows($con);

if ($qt_registros == 0){
        ?>
        <div class="alert alert-danger" style="margin-left:1%;margin-right:1%">Não há registro dessa aula para hoje</div>
<?php
    }
?>
 <div class="container-fluid">
<?php
   while ($resultado = mysqli_fetch_array($query)) {
?>

  <table class="table table-light">
    <thead>
    <tr>
       <th>Professor</th>
       <th>Sala</th>
       <th>Disciplina</th>
    </tr>
    </thead>

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
</div>
