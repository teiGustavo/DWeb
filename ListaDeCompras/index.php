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
        <label for="exampleInputEmail1" class="form-label">Produto:</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtProduto">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Quantidade:</label>
        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtQuantidade">
      </div>   
        <button type="submit" class="btn btn-primary" name="btnGravar">Gravar</button>
        <button type="submit" class="btn btn-primary" name="btnLimpar">Limpar Lista</button>
        <button type="button" class="btn btn-primary" name="btnJS" id="btnJS" onclick="progressBar()">JS</button>
      </form>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
    <div class="form" id="form">
    <?php
        if (isset($_POST["btnGravar"])){
            $produto = $_POST["txtProduto"];
            $quant = $_POST["txtQuantidade"];

            $item = array (
                "produto" => $produto,
                "quant" => $quant
            );

            if (isset($_SESSION["itens"])){
                $itens = $_SESSION["itens"];
            } else{
                $itens = array();
            }

            $itens[] = $item;
            $_SESSION["itens"] = $itens;

            echo "<table class='table'>";
            echo "<tr>";
            echo "<td>Produto</td>";
            echo "<td>Quantidade</td>";
            echo "<td>Comprado</td>";
            echo "</tr>";

            for ($i=0; $i<count($itens); $i++){
                $linha = $itens[$i];
                echo "<tr><td>".$linha["produto"]."</td>";
                echo "<td>".$linha["quant"]."</td>";
                echo "<td><input type='checkbox' name='checkbox' id='checkbox' onclick='checkbox()'></td></tr>";
            }
        }

        if (isset($_POST["btnLimpar"])){
            session_destroy();
        }
    ?>
        <div class="d-none" id="progress">
            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>

  </body>
    
  <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
  <script src="funcoes.js"></script>
    

</html>