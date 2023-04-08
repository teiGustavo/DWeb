<?php
    include "conexao.php";

    if (!isset($_SESSION)){
        session_start();
    }

    if($_SESSION["logado_adm"] == 0){
        header("location: login-adm.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <title>Staff</title>
    </head>
    <body>
        <div class="main-login">
            <div class="left-login">
                <h1>Página da STAFF<br>O que deseja fazer?</h1>
                <img src="css/img/processing-animate.svg" class="left-login-image" alt="Astronauta animação">
            </div>
            
            <form method="POST"> 
                <div class="right-login">
                    <div class="card-login">
                        <h1>OPÇÕES</h1>
                        <br>
                        <button type="submit" class="btn-login" name="btn-inserir">Inserir dados</button>
                        <button type="submit" class="btn-login" name="btn-consultar">Consultar dados</button>
                        <button type="submit" class="btn-login" name="btn-deslogar">Deslogar</button>

                    </div>
                </div>
            </form>

        </div>

        <?php
            if(isset($_POST["btn-inserir"])){
                header("location: adm_inserir.php");
            }

            if(isset($_POST["btn-consultar"])){
                header("location: adm_consultar.php");
            }

            if(isset($_POST["btn-deslogar"])){
                header("location: logoff.php");
            }
        ?>

    </body>
</html>