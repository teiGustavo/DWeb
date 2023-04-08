<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <title>Login</title>
    </head>
    <body>
        <div class="main-login">
            <div class="left-login">
                <h1>Olá administrador,<br>Seja bem vindo!</h1>
                <img src="css/img/admin-animate.svg" class="left-login-image" alt="Astronauta animação">
            </div>

            <form method="POST">
                <div class="right-login">
                    <div class="card-login">
                        <h1>LOGIN STAFF</h1>
                        <div class="textfield">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="textfield">
                            <label for="usuario">Senha</label>
                            <input type="password" name="senha" placeholder="Senha">
                        </div>
                        <button type="submit" class="btn-login" name="btn-login">Login</button>
                        <br><a href="index.php">Está aqui por engano? Página para alunos aqui!</a>

                        <?php
                            include "conexao.php";

                            if(isset($_POST["btn-login"])){
                                $email = $_POST["email"];
                                $senha = $_POST["senha"];

                                $sql = "SELECT * FROM ADMINISTRADOR WHERE EMAIL = '$email' AND SENHA = '$senha'";
                                $result = mysqli_query($conexao, $sql);
                                $row = mysqli_num_rows($result);

                                if($row >= 1){
                                    if (!isset($_SESSION)){
                                        session_start();
                                    }

                                    $_SESSION["logado_adm"] = 1;

                                    header("location: adm.php");
                                } else{
                                    $_SESSION["logado_adm"] = 0;

                                    echo "<br>Email e/ou senha incorretos!";
                                }
                            }
                        ?>

                    </div>
                </div>
            </form>

        </div>
    </body>
</html>