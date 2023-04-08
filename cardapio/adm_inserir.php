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
        <title>Staff Insert</title>
    </head>
    <body>
        <form method="POST"> 
            <div class="main-login">
                <div class="right-login" id="right-login">
                    <div class="card-login">
                        <h1>INSERT CURSO</h1>
                        <div class="textfield">
                            <label for="nomeCurso">Nome do curso</label>
                            <input type="text" name="nomeCurso" placeholder="Nome do curso">
                        </div>
                        <button type="submit" class="btn-login" name="btn-inserirCurso">Inserir</button>
                        <button type="submit" class="btn-login" name="btn-retornar">Retornar à pag principal</button>
                    </div>
                </div>
        </form>
            
            <form method="POST"> 
                <div class="right-login" id="right-login">
                    <div class="card-login">
                        <h1>INSERT CARDAPIO</h1>
                        <div class="textfield">
                            <label for="data">Data (AAAA-MM-DD)</label>
                            <input type="text" name="data" placeholder="Data do cardápio">
                        </div> 
                        <div class="textfield">
                            <label for="dia">Dia da semana</label>
                            <input type="text" name="dia" placeholder="Dia da semana">
                        </div> 
                        <div class="textfield">
                            <label for="cardapio">Cardapio</label>
                            <input type="text" name="cardapio" placeholder="Cardapio">
                        </div> 
                        <div class="textfield">
                            <label for="obs">Observação</label>
                            <input type="text" name="obs" placeholder="Observação">
                        </div> 
                        <button type="submit" class="btn-login" name="btn-inserirCardapio">Inserir</button>
                        <button type="submit" class="btn-login" name="btn-retornar">Retornar à pag principal</button>
                    </div>
                </div>
            </form>

        </div>

        <?php
            if(isset($_POST["btn-inserirCurso"])){
                $curso = $_POST["nomeCurso"];

                $sql = "INSERT INTO CURSO(CURSO) VALUES ('$curso')";
                mysqli_query($conexao, $sql);
            }

            if(isset($_POST["btn-inserirCardapio"])){
                $data = $_POST["data"];
                $dia = $_POST["dia"];
                $cardapio = $_POST["cardapio"];
                $obs = $_POST["obs"];

                $sql = "INSERT INTO CARDAPIO(DATA, DIASEMANA, CARDAPIO, OBSERVACAO) VALUES ('$data', '$dia', '$cardapio', '$obs')";
                mysqli_query($conexao, $sql);
            }   
            
            if(isset($_POST["btn-retornar"])){
                header("location: adm.php");
            }
        ?>

    </body>

    <script src="js/funcoes.js"></script>

</html>
