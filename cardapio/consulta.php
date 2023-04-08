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
        <link rel="stylesheet" href="css/estilo.css">
        <title>Consulta</title>
    </head>
    
    <body>
            
        <div class="tabela">
        
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

                    echo "<table class='tabela2'>";

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
            
        </div>

    </body>
</html>