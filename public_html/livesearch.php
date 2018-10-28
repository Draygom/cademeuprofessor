<?php
require('dbcon.php');

if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql_prof = "SELECT nome FROM professor WHERE nome LIKE ? GROUP BY nome";
    $sql_disc = "SELECT nome_disc, nome_curso FROM disciplina
      LEFT JOIN curso ON disciplina.curso_id_curso = curso.id_curso
      WHERE nome_disc LIKE ? ";

    //if professor
    if($stmt = mysqli_prepare($con, $sql_prof)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        // Set parameters
        $param_term = $_REQUEST["term"] . '%';

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    ?> <a href="exibe_sala_busca.php?p=<?php echo $row["nome"]?>" class="btn btn-outline-light rounded-0"  style="background-color:#ee7f22"><?php echo $row["nome"]?></a> <?php
                }
            }
          }
    }
    //if disciplina
    if($stmt = mysqli_prepare($con, $sql_disc)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        // Set parameters
        $param_term = $_REQUEST["term"] . '%';

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    ?> <a href="exibe_sala_busca.php?p=<?php echo $row["nome_disc"]?>" class="btn btn-outline-light rounded-0"  style="background-color:#ee7f22"><?php echo $row["nome_disc"]?></a> <?php
                }
            } else{
                echo "<p>Nenhum resultado encontrado</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql_disc. " || "ERROR: Could not able to execute $sql_prof. " . mysqli_error($con);
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// close connection
mysqli_close($con);
?>
