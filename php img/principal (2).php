<?php
    session_start();
    if(!isset($_SESSION["logado"])){
        header("location:index.php");
    }
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

        <h1>Olá você está na página principal do site!</h1> 
        <br>

        <form method="POST">
            <div class="mb-3">
                <label for="formFile" class="form-label">Insira sua imagem:</label>
                <input class="form-control" type="file" id="formFile" name="arq">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Comentário:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="txtDesc"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="btn">Enviar</button>
        </form>
    </div>
   
   <?php
    
            if(isset($_POST["btn"])){

                $desc = $_POST["txtDesc"];
                $nome_temp = $_FILES["arq"]["tmp_name"];
                $nome = $_FILES["arq"]["name"];

                move_uploaded_file($nome_temp, 'img/'.$nome);

                echo "<img src='img/$nome'<br>";
                echo "<span>$desc</span>";

            }

   ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
</body>
</html>