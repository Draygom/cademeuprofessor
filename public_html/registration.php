<?php
require('db.php');
include("menu.php");
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `usuarios` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>Cadastro bem sucedido.</h3><br/>Clique aqui para entrar <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="container-fluid">
<h1 class="display-4 text-center">Cadastro</h1>
<form name="registration" action="" method="post">
<input type="text" class="form-control my-1" name="username" placeholder="Username" required />
<input type="email" class="form-control my-1" name="email" placeholder="Email" required />
<input type="password" class="form-control my-1" name="password" placeholder="Password" required />
<input type="submit" class="btn btn-primary my-1" name="submit" value="Register" />
</form>
</div>
<?php }
include("bottom.php");
?>
