<?php
    require('db.php');
    session_start();
    // se coloca usuario e senha no formulario e envia
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']); // remove barras invertidas
        $username = mysqli_real_escape_string($con, $username); //filtra caracteres especiais não permitidos
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        //verifica se o usuario existe
        $query = "SELECT * FROM `usuarios` WHERE username='$username' and password='".md5($password)."'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows==1) {
            $_SESSION['username'] = $username;
            header("Location: user.php"); // redireciona pra pagina inicial do usuario
        } else {
            include("menu.php");?>
            <div class="alert alert-warning" role="alert">Login ou senha incorretos <a href="login.php" class="alert-link">Clique aqui para tentar novamente</a>.
            </div>;<?php
        }
    } else {
        ?>
<?php include("menu.php"); ?>
<div class="container-fluid">
<h1 class="display-4 text-center">Log In</h1>
<form action="" method="post" name="login">
<input type="text" class="form-control my-1" name="username" placeholder="Usuário" required />
<input type="password" class="form-control my-1" name="password" placeholder="Senha" required />
<input name="submit" class="btn btn-primary my-1" type="submit" value="Login" />
</form>
<?php /* <p>Ainda não possui uma conta? <a href='registration.php'>Registre-se aqui!</a></p> */ ?>

</div>
<?php
    }
    include("bottom.php");
    ?>
