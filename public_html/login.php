<?php
    include("menu.php");
    require('db.php');
    //session_start();
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
            echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=user.php">';// redireciona pra pagina inicial do usuario
        } else { ?>
            <div class="alert alert-warning" role="alert">Login ou senha incorretos <a href="login.php" class="alert-link">Clique aqui para tentar novamente</a>.
            </div>;<?php
        }
    } else {
        ?>
<?php //include("menu.php"); ?>
<div class="card mb-3 mx-auto center border-warning rounded-0" style="width: 25rem;">
<h1 class="display-5 text-center">Log In</h1>
<div class="container-fluid">
<form action="" method="post" name="login">
<input type="text" class="form-control my-1" name="username" placeholder="Usuário" required />
<input type="password" class="form-control my-1" name="password" placeholder="Senha" required />
<input name="submit" class="btn btn-warning col" type="submit" value="Login" />
</form>
</div>
</div>
<?php /* <p>Ainda não possui uma conta? <a href='registration.php'>Registre-se aqui!</a></p> */ ?>
</div>
<?php
    }
    include("bottom.php");
    ?>
