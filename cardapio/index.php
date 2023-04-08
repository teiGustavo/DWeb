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
                <h1>Caro estudante<br>Faça login e seja feliz</h1>
                <img src="css/img/pasta-animate.svg" class="left-login-image" alt="Astronauta animação">
            </div>

            <form method="POST">
                <div class="right-login">
                    <div class="card-login">
                        <h1>LOGIN</h1>
                        <div class="textfield">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="textfield">
                            <label for="usuario">Senha</label>
                            <input type="password" name="senha" placeholder="Senha">
                        </div>
                        <button type="submit" class="btn-login" name="btn-login">Login</button>
                        <a href="cadastro.php">Não possui conta? Faça seu cadastro aqui</a>
                        <br><a href="login-adm.php">Página para administradores</a>

                        <?php
                            include "conexao.php";

                            if (!isset($_SESSION)){
                                session_start();
                            }

                            if(isset($_POST["btn-login"])){
                                $email = $_POST["email"];
                                $senha = $_POST["senha"];

                                $sql = "SELECT * FROM ALUNO WHERE EMAIL = '$email' AND SENHA = '$senha'";
                                $result = mysqli_query($conexao, $sql);
                                $row = mysqli_num_rows($result);

                                if($row >= 1){


                                    $_SESSION["logado"] = 1;

                                    header("location: cardapio.php");
                                } else{
                                    $_SESSION["logado"] = 0;

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