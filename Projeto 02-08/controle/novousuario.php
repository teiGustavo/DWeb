<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form method="post">
        <label>Nome</label>
        <input type="text" name="txtNome" /><br>
        <label>Email</label>
        <input type="email" name="txtEmail" /><br>
        <label>Senha</label>
        <input type="password" name="txtSenha" /><br>
        <input type="submit" name="btGravar" value="Gravar">
    </form>

    <div class="main-login">
            <div class="left-login">
                <h1>Faça Login<br>E entre para nosso time</h1>
                <img src="styles/img/cat-astronaut-animate-two.svg" class="left-login-image" alt="Astronauta animação">
            </div>
            <div class="right-login">
                <div class="card-login">
                    <h1>LOGIN</h1>
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Usuário">
                    </div>
                    <div class="textfield">
                        <label for="usuario">Senha</label>
                        <input type="password" name="senha" placeholder="Senha">
                    </div>
                    <button type="button" class="btn-login">Login</button>
                </div>
            </div>
        </div>

    <?php
        require "conexao.php";

        if(isset($_POST["btGravar"])){
            $nome = $_POST["txtNome"];
            $email = $_POST["txtEmail"];
            $senha = md5($_POST["txtSenha"]);

            $sql = "INSERT INTO usuario(nome, email, senha, ativo, admin) 
                VALUES ('$nome', '$email', '$senha', 1, 0);";
            $res = mysqli_query($conexao, $sql);
            if($res){
                echo "<script>
                alert('Usuário cadastrado com sucesso!');
                window.location.href='index.php';
                </script>";
            }else{
                echo "Erro ao cadastrar o usuário";
            }
        }
    ?>
</body>
</html>