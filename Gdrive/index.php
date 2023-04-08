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
    <title>Principal</title>
</head>
<body>

    <div class="form">
    <br>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFile" class="form-label">Insira sua imagem:</label>
                <input class="form-control" type="file" id="formFile" name="imgArq">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Comentário:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="txtDesc"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="btnEnviar">Enviar</button>
            <button type="submit" class="btn btn-primary" name="btnExcluir">Excluir sessão</button>
        </form>
   
    <?php
        
                if(isset($_POST["btnEnviar"])){

                    if(!isset($_SESSION["arquivos"])){
                        $_SESSION["arquivos"] = "";
                    }

                    $nomeAtt = "";
                    $agora = date('d-m-Y_H-i-s');
                    $desc = $_POST["txtDesc"];
                    $nome_temp = $_FILES["imgArq"]["tmp_name"];
                    $nome = time(). $_FILES["imgArq"]["name"];
                    $nomeDate = explode(".", $nome);
                    $tamanho = count($nomeDate)-1;
                    $nomeAtt .= "$agora";
                    $nomeAtt .= ".";
                    $nomeAtt .= "$nomeDate[$tamanho]";

                    move_uploaded_file($nome_temp, "uploads/$nomeAtt");

                    echo "<br>";
                    $_SESSION["arquivos"] = $_SESSION["arquivos"]."<a target='_blank' href='uploads/$nomeAtt'>$nomeAtt<a><br>";
                    echo $_SESSION["arquivos"];
                }


                if (isset($_POST["btnExcluir"])){
                    session_destroy();
                }
    ?>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
</body>
</html>