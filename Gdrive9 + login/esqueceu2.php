<?php
    include("conexao.php");

    if (!isset($_SESSION)){
        session_start();
    }

    if(isset($_POST["btnAlterar"])){
        $senha = $_POST["forgotSenhaRpt"];
        $id = '';
        $email = $_SESSION["forgotEmail"]; 
        $query = "SELECT * FROM usuario WHERE email = '$email'";
        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result); 

        if($row == 1){
            $query2 = "SELECT id FROM usuario WHERE email = '$email' ";
            $result2 = mysqli_query($conexao,$query2);
            $row2 = mysqli_num_rows($result2);
            if($row2 == 1){
                $linha = mysqli_fetch_assoc($result2);
                mysqli_query($conexao, "UPDATE usuario SET senha = '$senha' WHERE id = {$linha['id']} ");   
                header("location: index.php");
            }
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

    <body class="criar-js">

        <div class="container">
            <div class="content first-content">
                <div class="first-column" id="first-column-primary">
                    <h5 class="title title-primary">Caso não queira prosseguir:</h5>
                    <p class="description description-primary">Retorne para a página principal</p>
                    <a class="btn btn-outline-primary" href="index.php" role="button">Voltar</a>
                </div>
                <div class="first-column first-column-second" id="first-column-second">
                    <h3>Validação de sua senha:</h3>
                    <p class="valid-feedback" id = "first-column-second-feedback-positive">A senha parece boa!</p>
                    <p class="invalid-feedback" id = "first-column-second-feedback-negative">A senha deve conter 8 caracteres!</p>
                    <p class="invalid-feedback" id = "first-column-second-feedback-negative-two">A senha precisa ter ao menos uma letra</p>
                    <p class="invalid-feedback" id = "first-column-second-feedback-negative-three">As senhas precisam ser iguais!</p>

                    <div>
                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..." id="checkSenha" onclick="exibirSenha()">
                        <label class="form-check-label" for="inlineCheckbox1">Exibir senha?</label>
                    </div>
                </div>
                <div class="second-column">
                    <h2 class="title title-second">Agora por favor, defina a nova senha desejada:</h2>  
                    <br> 
                    <form method="POST" onsubmit="return valid()">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                            <input type="password" class="form-control" name="forgotSenha" placeholder="Defina sua senha" id="validacao" onkeyup="valid()">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                            <input type="password" class="form-control" name="forgotSenhaRpt" placeholder="Repita a senha" id="validacao2" onkeyup="valid()">                          
                        </div>
                        <button type="submit" class="btn btn-outline-primary" name="btnAlterar">Alterar</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="./node_modules/jquery/dist/jquery.js"></script>
        <script src="./js/funcoes.js"></script>
    </body>
</html>