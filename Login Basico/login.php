<?php
    session_start();
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

    <form method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Usuário:</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtUsuario">
      </div>  
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Senha:</label>
        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtSenha">
      </div>
        <button type="submit" class="btn btn-primary" name="btnEntrar">Entrar</button>
      </form>

      <div class="form">
        <?php
            if(isset($_POST["btnEntrar"])){
                $usuario = $_POST["txtUsuario"];
                $senha = $_POST["txtSenha"];

                if(($usuario == "admin") && ($senha == "1234")){
                    echo "Usuario e senha corretos!";
                    $_SESSION["logado"] = true;
                    $_SESSION["nome"] = "Gustavo";
                    header("location:index.php");
                } else{
                    echo "Usuario e/ou senha incorretos!";
                    $_SESSION["logado"] = false;
                }

            }
        ?>
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