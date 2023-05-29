<?php
session_start();
if (!isset($_SESSION['id_usuarios'])) {
  if (isset($_COOKIE['id_usuarios']) && isset($_COOKIE['apelido'])) {
    $_SESSION['id_usuarios'] = $_COOKIE['id_usuarios'];
    $_SESSION['apelido'] = $_COOKIE['apelido'];
  }
}
/* if ($_SERVER['HTTPS']!="on") {
        $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        header("Location:$redirect");
    }*/
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <style type="text/css">
  .form-control:focus {
        border-color: #ee7f22;
        box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.07) inset, 0px 0px 8px rgba(254, 252, 96, 0.5);
    }
</style>
</head>
<body style="background-color:white">
  <?php if (!isset($_SESSION["apelido"])) { ?>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#ee7f22">
    <a href="index.php" class="navbar-brand">Home</a>
    <a href="salas.php" class="navbar-brand">Salas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav nav">
        <li class="nav-item active">
          <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
        </li>
    </div>
  </nav>
  <?php }else{ ?>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#ee7f22">
    <a href="index.php" class="navbar-brand">Home</a>
    <a href="salas.php" class="navbar-brand">Salas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="user.php"><?php echo $_SESSION["apelido"]; ?><span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="dashboard.php">Painel de controle<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="logout.php">Sair<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <?php } ?>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.search-box input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result");
          if(inputVal.length){
              $.get("livesearch.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });

      // Set search input value on click of result item
      $(document).on("click", ".result p", function(){
          $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
          $(this).parent(".result").empty();
      });
    });
  </script>
  <div class="search-box">
    <form class="" name="frm_busca" action="busca.php" method="get">
      <div class="form-group">
        <input type="text" autocomplete="off" id="b" name="b" class="form-control rounded-0 border-right-0" placeholder="Professor ou disciplina..." aria-label="pesquisa">
        <!-- <div class="input-group-append">
          <button class="btn btn-light" type="submit">Buscar</button>
        </div> -->
        <div class="result btn-group-vertical col"></div>
      </div>
    </form>
  </div>
