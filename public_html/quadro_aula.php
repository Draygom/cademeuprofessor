<?php
require('dbcon.php'); //faz a conexão com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
include("auth.php"); //incluir o arquivo de autenticação em todas a paginas privadas
//pega o curso
$curso = $_GET["c"];
//seleciona todos os cursos cadastrados
$query = mysqli_query($con, "SELECT * FROM curso")
 or die("<br>Erro: ".mysqli_error($con));
?>
<title>Quadro de horários</title>

<div class="container-fluid">

  <div class="card">
    <nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
      <h5 class="text-white h4"><?php echo $curso ?></h5>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="regist_quadro.php?c=<?php echo $curso ?>">Cadastrar/Editar</a>
        </div>
      </div>
    </nav>

    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th><b>Turma 01</b></th>
            <th class="text-center">
              Segunda-Feira<br>
            </th>
            <th class="text-center">
              Terça-Feira<br>
            </th>
            <th class="text-center">
              Quarta-Feira<br>
            </th>
            <th class="text-center">
              Quinta-Feira<br>
            </th>
            <th class="text-center">
              Sexta-Feira<br>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="text-nowrap" scope="row">Salas</th>
            <td>Sala 00</td>
            <td>Sala 01</td>
            <td>Sala 02</td>
            <td>Sala 03</td>
            <td>Sala 04</td>
          </tr>
          <tr>
            <th class="text-nowrap" scope="row">Disciplinas</th>
            <td><code>Disciplina 1</code></td>
            <td><code>Disciplina 2</code></td>
            <td><code>Disciplina 3</code></td>
            <td><code>Disciplina 4</code></td>
            <td><code>Disciplina 5</code></td>
          </tr>
          <tr>
            <th class="text-nowrap" scope="row">Professores</th>
            <td>Nome do Professor</td>
            <td>Nome do Professor</td>
            <td>Nome do Professor</td>
            <td>Nome do Professor</td>
            <td>Nome do Professor</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

</div>


<?php
include("bottom.php");
?>
