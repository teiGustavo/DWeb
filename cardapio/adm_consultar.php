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
        <title>Staff Consultas</title>
    </head>
    <body>
        <div class="main-login">
            <div class="left-login">
                <h1>Consulta de dados,<br>Use com moderação</h1>
                <img src="css/img/processing-animate.svg" class="left-login-image" alt="Astronauta animação" id="img">
            </div>
            
            <form method="POST" action="consulta.php" target="_blank"> 
                <div class="right-login">
                    <div class="card-login">
                        <h1>CONSULTAR DADOS</h1>
                        <div class="textfield">
                        <label for="tabela">Tabela</label>
                            <select class="combobox2" id="combobox2_curso" name="tabela">
                                <option>Selecione a tabela</option>
                                <?php
                                    $sql = "SELECT TABLE_NAME FROM information_schema.tables where table_schema in (SELECT DATABASE());";
                                    $resultado = mysqli_query($conexao, $sql);

                                    while($linha=mysqli_fetch_array($resultado)){
                                       echo "<option value=".$linha['TABLE_NAME'].">".$linha['TABLE_NAME']."</option>";
                                    }

                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn-login" name="btn-consultar">Consultar dados</button>
                        <a href="adm.php"><button type="button" class="btn-login" name="btn-deslogar">Retornar</button></a>
                    </div>
                </div>
            </form>

        </div>

        <?php   
            if(isset($_POST["btn-consultar"])){
                $tabela = $_POST["tabela"];
                
                $sql = "SELECT * FROM $tabela";
                $resultado = mysqli_query($conexao, $sql);

                    
                $sql2 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME IN ('$tabela')";
                $resultado2 = mysqli_query($conexao, $sql2);

                $sql3 = "SELECT count(COLUMN_NAME) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME IN ('$tabela');";
                $resultado3 = mysqli_query($conexao, $sql3);
                $row = mysqli_fetch_array($resultado3);

                echo "<table border='1'>";

                    echo "<tr>";
                    while($coluna=mysqli_fetch_array($resultado2)){
                        echo "<th>";
                            echo $coluna['COLUMN_NAME'];
                        echo "</th>";
                    }
                    echo "</tr>";

                    while($linha=mysqli_fetch_array($resultado)){
                        echo "<tr>";
                            for ($i=0; $i<$row[0]; $i++){
                                echo "<td>".$linha[$i]."</td>";
                            }
                        echo "</tr>";  
                    }
            
                echo "</table>";

            }
        ?>

    </body>

    <script src="js/funcoes.js"></script>
</html>