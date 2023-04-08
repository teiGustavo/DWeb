<?php
    include("conexao.php");

    if(isset($_POST["loginEmail"]) || isset($_POST["loginSenha"])){
        if(strlen($_POST["loginEmail"] == 0)){
            echo "Preencha seu email";
        }else if (strlen($_POST["loginSenha"] == 0)){
            echo "Preencha sua senha";
        }else {
            $email = mysqli_real_escape_string($conexao, $_POST["loginEmail"]);
            $senha = mysqli_real_escape_string($conexao, $_POST["loginSenha"]);

            $query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
            $result = mysqli_query($conexao, $query);
            $row = mysqli_num_rows($result); 

            if($row == 1){
                if (!isset($_SESSION)){
                    session_start();
                }

                $_SESSION["id"] = $id;
                $_SESSION["email"] = $email;

                header("location: gdrive.php");
            }else {
                $_SESSION["autenticado"] = false;
                echo "Falha ao logar! Email e/ou senha incorretos!";
            }
        }
    }

    if(isset($_POST["btnCadastrar"])){
        $usuario = $_POST["registroUsuario"];
        $email = $_POST["registroEmail"];
        $senha = $_POST["registroSenha"];
    
        $query = mysqli_query($conexao, "INSERT INTO usuario(usuario, email, senha) VALUES('$usuario', '$email', '$senha')");
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
    <title>Login</title>
</head>
<body class="logar-js">
    <div class="preload" id="preload"></div>

    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Seja Bem vindo!</h2>
                <p class="description description-primary">Você ja possui uma conta?</p>
                <p class="description description-primary">Se sim, prossiga com seu login, caro amigo</p>
                <button class="btn btn-outline-primary" id="logar-se" onclick="logar()">Logar-se</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Crie sua conta, viajante:</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <li class="item-social-media">
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg></a>
                        </li>
                        <li class="item-social-media">
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16"><path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/></svg></a>
                        </li>
                        <li class="item-social-media">
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/></svg></a>
                        </li>
                    </ul>
                </div>    
                <p class="description description-second">Ou utilize seu email para se registrar</p>
                <form method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                        <input type="text" class="form-control" name="registroUsuario" placeholder="Usuário">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" class="form-control" name="registroEmail" placeholder="Email">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                        <input type="password" class="form-control" name="registroSenha" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-outline-primary" name="btnCadastrar">Criar conta</button>
                </form>
            </div>
        </div>

        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem vindo de volta!</h2>
                <p class="description description-primary">Não possui conta?</p>
                <p class="description description-primary">Comece uma jornada com a gente!</p>
                <button class="btn btn-outline-primary" onclick="criar()" id="registrar-se">Registrar-se</button>
            </div>
            <div class="first-column first-column-second" id="first-column-second">
                <h2 class="title title-primary">AABC</h2>
                <p class="description description-primary">Falha ao logar! Email e/ou senha incorretos!</p>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Entre com sua conta marujo!:</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <li class="item-social-media">
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg></a>
                        </li>
                        <li class="item-social-media">
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16"><path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/></svg></a>
                        </li>
                        <li class="item-social-media">
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/></svg></a>
                        </li>
                    </ul>
                </div>      
                <p class="description description-second">Ou utilize seu email para efetuar o login</p>
                <form method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" class="form-control" name="loginEmail" placeholder="Email">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                        <input type="password" class="form-control" name="loginSenha" placeholder="Senha">
                    </div>
                    <a href="esqueceu.php" class="password">Esqueceu sua senha?</a><br><br>
                    <button type="submit" class="btn btn-outline-primary" name="loginEntrar">Logar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="./node_modules/jquery/dist/jquery.js"></script>
    <script src="./js/funcoes.js"></script>
</body>
</html>