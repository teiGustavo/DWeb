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
    <?php
        require "conexao.php";

        if(isset($_POST["btGravar"])){
            $nome = $_POST["txtNome"];
            $email = $_POST["txtEmail"];
            $senha = md5($_POST["txtSenha"]);

            $sql = "INSERT INTO usuario(nome, email, senha, ativo) 
                VALUES ('$nome', '$email', '$senha', 1);";
            $res = mysqli_query($conexao, $sql);
            if($res){
                echo "Usuário cadastrado com sucesso!";
            }else{
                echo "Erro ao cadastrar o usuário";
            }
        }
    ?>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <?php
            $sql = "SELECT * FROM usuario;";
            $resultado = mysqli_query($conexao, $sql);
            while($linha = mysqli_fetch_assoc($resultado)){
                echo "<tr>";
                echo "<td>".$linha["nome"]."</td>";
                echo "<td>".$linha["email"]."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>