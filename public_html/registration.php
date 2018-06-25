<?php
require('dbcon.php');
include("menu.php");
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['apelido'])){
		$apelido = stripslashes($_REQUEST['apelido']); // removes backslashes
		$apelido = mysqli_real_escape_string($con,$apelido); //escapes special characters in a string
    $nome = stripslashes($_REQUEST['nome']);
		$nome = mysqli_real_escape_string($con,$nome);
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$data = date("Y-m-d H:i:s");
        $query = "INSERT into `usuarios` (apelido, nome, password, email, data_cadastro) VALUES ('$apelido', 'nome', '".md5($password)."', '$email', '$data')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>Cadastro bem sucedido.</h3><br/>Clique aqui para entrar <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="container-fluid">
  <h1 class="display-4 text-center">Cadastro</h1>
  <form name="registration" action="" method="post">
    <input type="text" class="form-control my-1" name="apelido" placeholder="Apelido" required />
    <input type="text" class="form-control my-1" name="nome" placeholder="Nome" required />
    <input type="email" class="form-control my-1" name="email" placeholder="E-mail" required />
    <input type="password" class="form-control my-1" name="password" placeholder="Senha" required />
    <input type="submit" class="btn btn-primary my-1" name="submit" value="Enviar" />
  </form>
</div>
<?php }
include("bottom.php");
?>
