<?php
    session_start();

    include "util.php";
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

    <form method="post">
        <input type="text" name="l1" maxlength="1">
        <input type="text" name="l2" maxlength="1">
        <input type="text" name="l3" maxlength="1">
        <input type="text" name="l4" maxlength="1">
        <input type="text" name="l5" maxlength="1">
        <input type="submit" name="bt" value="Enter">
    </form>

    <?php
        if(isset($_POST["bt"])){
            $letras = array(
                $_POST["l1"],
                $_POST["l2"],
                $_POST["l3"],
                $_POST["l4"],
                $_POST["l5"]
            );
            
            $palavra = $_SESSION["palavra"];
            echo "<br>";
            
            verifica($palavra, $letras);
        }
    
    ?>

    <script src="funcoes.js"></script>

</body>
</html>