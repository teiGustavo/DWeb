<?php
    session_start();
    include "conexao.php";
    include "helperconfiguracao.php";
    if(!isset($_SESSION["id"])){
        header("location:index.php");
    }

    $id = $_SESSION["id"];
    if(isset($_POST["btAlterar"])){
        $linha = busca($id, $conexao);
        altera($_POST, $_FILES, $linha, $conexao);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label>Nome</label>
        <input type="text" name="txtNome" 
         value="<?php echo $linha["nome"]; ?>">

        <label>Email</label>
        <input type="text" name="txtEmail"
        value="<?php echo $linha["email"]; ?>">

        <label>Senha</label>
        <input type="password" name="txtSenha">
        <label>Foto</label>
        <input type="file" name="txtFoto"
         value="<?php echo $linha["imagem"]; ?>">
        <label><input type="checkbox" name="cbInativo">
            Desativar o perfil</label>
        <input type="submit" name="btAlterar" value="Alterar">
    </form>
</body>
</html>