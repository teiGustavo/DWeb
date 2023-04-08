<?php
    session_start();

    include "util.php";

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jogo Xbox S</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
  <body>
  <div id="preload" class="preload"></div>
   
  <div class="form">

        <h1>TERMO</h1>
        <br>

        <form method="POST">

        <?php
            if(isset($_POST["btVerificar"])){
                $letras = array(
                    $_POST["txt1"],
                    $_POST["txt2"],
                    $_POST["txt3"],
                    $_POST["txt4"],
                    $_POST["txt5"]);

                $palavra = $_SESSION["palavra"];
                verifica($palavra, $letras);
            }

            if(isset($_POST["btLimpar"])){
                session_destroy();
                header("location: index.php");
            }
        ?>

            <div name="formTermo">    
                <input type="text" class="termo" name="txt1" id="txt1" maxlength="1" autofocus>
                <input type="text" class="termo" name="txt2" id="txt2" maxlength="1">
                <input type="text" class="termo" name="txt3" id="txt3" maxlength="1">
                <input type="text" class="termo" name="txt4" id="txt4" maxlength="1">
                <input type="text" class="termo" name="txt5" id="txt5" maxlength="1">
            </div>
                <br>
                <button type="submit" class="btn btn-primary" name="btVerificar">Verificar</button>
                <button type="submit" class="btn btn-primary" name="btLimpar">Limpar</button>
                <br><br>
        </form>
    
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>

    <script type="text/javascript" src="JS/jquery-3.6.0.min.js"></script>
    <script src="JS/funcoes.js"></script>

</html>