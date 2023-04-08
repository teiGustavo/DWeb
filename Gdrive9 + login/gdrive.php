<?php
    
    if (!isset($_SESSION)){
        session_start();
    }

    if(!$_SESSION["email"]){       
        header("location: index.php");
    }

    include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
        <title>GDRIVE</title>
    </head>
    <body>

        <div class="block1">
            <h2>Olá, <?php echo $_SESSION["email"];?></h2>
            <br>

            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Insira sua imagem:</label>
                    <input class="form-control" type="file" id="formFile" name="imgArq">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Comentário:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="txtDesc"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="btnEnviar">Enviar</button>
                <button type="submit" class="btn btn-primary" name="btnExcluir">Excluir sessão</button>
                <button type="submit" class="btn btn-primary" name="btnSair">Sair</button>
            </form>
            
    
            <?php

                if(isset($_POST["btnEnviar"])){

                    if(!isset($_SESSION["arquivos"])){
                        $_SESSION["arquivos"] = "";
                    }

                    $nomeAtt = "";
                    $agora = date('d-m-Y_H-i-s');
                    $desc = $_POST["txtDesc"];
                    $nome_temp = $_FILES["imgArq"]["tmp_name"];
                    $nome = time(). $_FILES["imgArq"]["name"];
                    $nomeDate = explode(".", $nome);
                    $tamanho = count($nomeDate)-1;
                    $nomeAtt .= "$agora";
                    $nomeAtt .= ".";
                    $nomeAtt .= "$nomeDate[$tamanho]";

                    move_uploaded_file($nome_temp, "uploads/$nomeAtt");   

                    echo "<br>";
                    $_SESSION["arquivos"] = $_SESSION["arquivos"]."<a target='_blank' href='uploads/$nomeAtt'>$nomeAtt<a><br>";
                    echo $_SESSION["arquivos"];
                }

                    if (isset($_POST["btnExcluir"])){
                        unset($_SESSION["arquivos"]);
                    }

                    if (isset($_POST["btnSair"])){
                        session_destroy();
                        $_SESSION["logado"]= null;
                        header("location:index.php");
                    }

            ?>

        </div>

        <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="./node_modules/jquery/dist/jquery.js"></script>
        <!--script src="./js/funcoes.js"></script-->
    </body>
</html>