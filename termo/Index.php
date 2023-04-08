<?php
    session_start();

    include "util.php";
    $palavra = sorteio();

    $_SESSION["palavra"] = $palavra;
    $_SESSION["tentativa"] = "";
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termo</title>
    <link rel="stylesheet" href="estilo_index.css">
</head>
<body>

    <div class="load" id="load"></div>

    <div class="imagem">
        <img src="imagem_index.png" id="controle">
        <a href="jogo.php" class="bt">Jogar</a>
    </div>
    
    
    <script src="funcoes.js"></script>

</body>
</html>