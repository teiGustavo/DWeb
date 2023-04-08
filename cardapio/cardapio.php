<?php
    if (!isset($_SESSION)){
        session_start();
    }

    if($_SESSION["logado"] == 0){
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Cardápio</title>
</head>
<body>
    <!--menu-->
    <?php
        include "conexao.php";

        $sql = "SELECT * FROM cardapio WHERE data >= CURRENT_DATE";
        $resultado = mysqli_query($conexao, $sql);

        while($linha=mysqli_fetch_array($resultado)){
            echo "<div class='item'>";
            echo "<h4>".$linha["diasemana"]."</h4>";
            echo "<p>".$linha["cardapio"]."</p>";
            echo "<a href='detalhe.php?id=".
                        $linha["idcardapio"]."'>Ver mais</a>";
            echo "</div>";
        }
    ?>

    <a href="logoff.php"><button type="button" class="btn-login" name="btn-deslogar">Deslogar</button></a>
    
</body>
</html>