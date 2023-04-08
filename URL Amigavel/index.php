<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            $url = $_SERVER['REQUEST_URI'];

            if ($url == "/")
                $url = "/home";

            $url = "pages" . $url . ".php";

            if (file_exists($url)) 
                require_once $url;
            else
                require_once "pages/404.php";
        ?>
    </body>
</html>