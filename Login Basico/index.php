<?php
    session_start();
    if(!isset($_SESSION["logado"])){
        header("location:login.php");
    } elseif($_SESSION["logado"] == false){
        header("location:login.php");
    }
?>

<!doctype html>
    <html lang="pt-br">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>HTML</title>
    </head>
    
    <body>
        <div id="preload" class="preload"></div>

        <div class="form">
             <?php
                echo "Bem vindo ", $_SESSION["nome"], "<br><br>";
                
                
             ?>
            <a class="btn btn-primary" href="teste.php" role="button" name="btnDeslogar">Deslogar</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

    <script>

        window.onload = function(){
            var div = document.getElementById('preload');
            preload(div, 50);
        };
        function preload(el, interval){
            var op = 1;
            var timer = setInterval(function () {
                if (op <= 0.1){
                    clearInterval(timer);
                    el.style.display = 'none';
                    el.className = '';
                }
                el.style.opacity = op;
                op -= op * 0.1;
            }, interval);
        }

    </script>

    </html>