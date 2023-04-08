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
                <h1>Olá novato<br>Insira seus dados abaixo</h1>
                <img src="css/img/lunch-time-animate.svg" class="left-login-image" alt="Astronauta animação">
            </div>

            <form method="POST">
                <div class="right-login">
                    <div class="card-login">
                        <h1>LOGIN</h1>
                            <div class="textfield">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" placeholder="Nome">
                            </div>
                            <div class="textfield">
                                <label for="apelido">Apelido</label>
                                <input type="text" name="apelido" placeholder="Apelido">
                            </div>
                            <div class="textfield">
                                <label for="curso">Curso</label>
                                <select class="combobox" id="combobox_curso" name="curso">
                                    <option>Selecione seu curso</option>
                                    <option value="1">Agroecologia</option>
                                    <option value="2">Eletrotécnica</option>
                                    <option value="3">Informática</option>
                                    <option value="4">Mecânica</option>
                                    <option value="5">Meio Ambiente</option>
                                </select>
                            </div>
                            <div class="textfield">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Email">
                            </div>
                            <div class="textfield">
                                <label for="usuario">Senha</label>
                                <input type="password" name="senha" placeholder="Senha">
                            </div>
                            <button type="submit" class="btn-login" name="btn-cadastro">Login</button>
                        <a href="index.php">Já possui conta? Faça seu login</a>
                    </div>   
                </div>
            </form>

            <?php
                include "conexao.php";

                if(isset($_POST["btn-cadastro"])){
                    $nome = $_POST["nome"];
                    $apelido = $_POST["apelido"];
                    $curso = $_POST["curso"];
                    $email = $_POST["email"];
                    $senha = $_POST["senha"];

                    $sql = "INSERT INTO ALUNO(NOME, APELIDO, CURSO_IDCURSO, EMAIL, SENHA) VALUES ('$nome', '$apelido', $curso, '$email', '$senha')";
                    mysqli_query($conexao, $sql);

                    header("location: index.php");
                }
            ?>

        </div>
    </body>
</html>