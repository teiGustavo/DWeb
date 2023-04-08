<?php
  session_start();

  include "util.php";
  $palavra = sorteio();

  $_SESSION["palavra"] = $palavra;
  $_SESSION["tentativa"] = "";
  $_SESSION["qtd"] = 0;
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jogo Xbox S</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="stylejogo.css">
</head>
  <body>
  <div id="preload" class="preload"></div>
    
    
    <div class="principal">  
        <a href="jogo.php" role="button"><img src="img\Game-Controller-PNG-Photo.png"></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>

    <script type="text/javascript" src="JS/jquery-3.6.0.min.js"></script>
    <script src="JS/funcoes.js"></script>
</html>