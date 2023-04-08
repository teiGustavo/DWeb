<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curtir</title>
</head>
<body>
    <?php
        if (!isset($_SESSION)){
            session_start();
        }

        if($_SESSION["logado"] == 0){
            header("location: index.php");
        }

        include "conexao.php";
        $id = $_GET["id"];
        $aluno = $_GET["aluno"];

        $sql = "INSERT INTO curtida(
            cardapio_idcardapio, aluno_idaluno) VALUES
            ($id, $aluno)";
        
        if(mysqli_query($conexao, $sql)){
            $sql = "UPDATE cardapio SET 
            totalcurtida=totalcurtida+1 WHERE
            idcardapio=$id";
            mysqli_query($conexao, $sql);
        }
        header("location:detalhe.php?id=$id");
    ?>
</body>
</html>