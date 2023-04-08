<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

    <div class="form">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Usuário:</label>
                <input type="text" class="form-control" name="txtUsuario">
            </div>
            <div class="mb-3">
                <label class="form-label">Senha:</label>
                <input type="password" class="form-control" name="txtSenha">
            </div>
            <button type="submit" class="btn btn-primary" name="btEntrar">Logar</button>
        </form>
    </div>

    <?php
        if(isset($_POST["btEntrar"])){
            $usuario = $_POST["txtUsuario"];
            $senha = $_POST["txtSenha"];

            if($usuario=="admin" && $senha==1234){
                $_SESSION["logado"]=1;
                header("location:principal.php");
            }else{
                echo "Usuário e\ou senha incorreto(s)";
            }
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>