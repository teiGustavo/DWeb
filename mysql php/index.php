<?php
  session_start();

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MYSQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
  <body>

  <div class="form">
    <form method="post">
      <div class="mb-3">
        <!--label for="exampleInputEmail1" class="form-label">Usuário:</label-->
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtUsuario" placeholder="Email">
      </div>
      <div class="mb-3">
        <i class="inpu">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
          </svg>
        </i>
        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtSenha" placeholder="Password">
      </div>   
        <button type="submit" class="btn btn-primary" name="btnEnviar">Enviar</button>
        <button type="submit" class="btn btn-primary" name="btnLimpar">Limpar Sessão</button>
      </form>

      <?php
        if (isset($_POST["btnEnviar"])){
          $usuario = $_POST["txtUsuario"];
          $senha = $_POST["txtSenha"];

          if ($usuario == "admin" && $senha == 1234){
            $_SESSION["logado"] = 1;
            header("location: principal.php");
          }else {
            echo "<br>Usuário e/ou senha incorreto(s)!";
          }
        }
      ?>

  </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="funcoes.js"></script>
</body>
</html>