<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Atv2.css">
    <title>PHP ESPELHO</title>
  </head>
  <body>

    <div class="form">
      <?php
        
        if(!empty($_POST)){
          foreach ($_POST as $variavel => $valor){
            $$variavel = $valor;
          }

          $txtNumMax = strlen($txtNum);
          
          for ($i=$txtNumMax; $i>=0; $i--){
            $txtResult = substr($txtNum,$i,1);
            echo "$txtResult"; 
          }
          echo "<br> <br>";
        }

      ?>
      <a class="btn btn-primary" href="Atv2.html" role="button">Voltar</a>

      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>