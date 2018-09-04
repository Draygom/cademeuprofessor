<?php
    include("menu.php");
    require('dbcon.php');
    //verifica se o usuario ja nao está logado.
    if (!isset($_SESSION["apelido"]) && !isset($_SESSION["id_usuarios"])) {
    // se coloca usuario e senha no formulario e envia
    if (isset($_POST['apelido'])) {
        $apelido = stripslashes($_REQUEST['apelido']); // remove barras invertidas
        $apelido = mysqli_real_escape_string($con, $apelido); //filtra caracteres especiais não permitidos
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        //verifica se o usuario existe
        $query = "SELECT id_usuarios, apelido FROM `usuarios` WHERE apelido='$apelido' and password='".md5($password)."'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
        if ($rows==1) {
          $row = mysqli_fetch_array($result);
          $_SESSION['id_usuarios'] = $row['id_usuarios'];
          $_SESSION['apelido'] = $row['apelido'];
          setcookie('id_usuarios', $row['id_usuarios'], time() + (60 * 60 * 24 * 30), "/", "cademeuprofessor.com"); //cria um cookie que dura 30 dias
          setcookie('apelido', $row['apelido'], time() + (60 * 60 * 24 * 30), "/", "cademeuprofessor.com"); //cria um cookie que dura 30 dias
          echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=user.php">'; // redireciona pra pagina inicial do usuario
        } else { ?>
            <div class="alert alert-warning" role="alert">Login ou senha incorretos.</div>;
            <?php
        }
    }
  } ?>
<div class="card mb-3 mx-auto rounded-0" style="width: 18rem;">
<h3 class="display-5" style="text-align:center; color:#626262;">Login</h3>
<div class="container-fluid">
<form action="" method="post" name="login">
<input type="text" class="form-control my-1" name="apelido" placeholder="Apelido" required />
<input type="password" class="form-control my-1" name="password" placeholder="Senha" required />
<input name="submit" class="btn col" style="background-color:#ee7f22" type="submit" value="Login" />
</form>
</div>
</div>
<?php /* <p>Ainda não possui uma conta? <a href='registration.php'>Registre-se aqui!</a></p> */ ?>
</div>
<?php include("bottom.php"); ?>
