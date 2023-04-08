<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post">
        <label>E-mail</label>
        <input type="email" name="txtEmail" ><br>
        <label>Senha</label>
        <input type="password" name="txtSenha"><br>
        <input type="submit" name="btLogar" value="Entrar">
    </form>
    <?php
        if(isset($_POST["btLogar"])){
            $email = $_POST["txtEmail"];
            $senha2 = md5($_POST["txtSenha"]);

            include "conexao.php";

            $sql = "SELECT * FROM usuario WHERE email = '$email' AND 
            senha = '$senha2';";
            $resultado = mysqli_query($conexao, $sql);

            if(mysqli_num_rows($resultado)>0){
                $_SESSION["logado"]=1;
                $_SESSION["email"]=$email;
                $linha = mysqli_fetch_array($resultado);
                $_SESSION["id"]=$linha["idusuario"];

                header("location:cadastro.php");
            }else{
                echo "Usuário e/ou senha incorreto(s)";
            }
        }
    ?>
    <a href="novousuario.php">Cadastra-se</a>
</body>
</html>