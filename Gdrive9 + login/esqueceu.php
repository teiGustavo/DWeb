<?php
    include("conexao.php");

    if (!isset($_SESSION)){
        session_start();
    }

    if(isset($_POST["forgotProcurar"])){
        $email = $_POST["forgotEmail"];
        $id = "";
        $query = "SELECT * FROM usuario WHERE email = '$email'";
        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result); 

        if($row == 1){
            $_SESSION["forgotEmail"] = $email;
           header("location: esqueceu2.php");
        }else {
            echo "Email não encontrado!";
        }
    }
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
        <title>ESQUECEU</title>
    </head>
    <div class="preload" id="preload"></div>

    <body class="logar-js">

        <div class="container">
            <div class="content second-content">
                <div class="first-column">
                    <h2 class="title title-primary">Está aqui por engano?</h2>
                    <p class="description description-primary">Retorne para a página principal</p>
                    <a class="btn btn-outline-primary" href="index.php" role="button">Voltar</a>
                </div>
                <div class="second-column">
                    <h2 class="title title-second">Entre com seu email e ache sua conta:</h2>    
                    <p class="description description-second">Efetue o login para redefinir sua senha</p>
                    <form method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" class="form-control" name="forgotEmail" placeholder="Email">
                        </div>
                        <button type="submit" class="btn btn-outline-primary" name="forgotProcurar" onclick="ocultar()">Procurar</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="./node_modules/jquery/dist/jquery.js"></script>
        <script src="./js/funcoes.js"></script>
    </body>
</html>