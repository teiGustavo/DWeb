<?php
    $servidor = "127.0.0.1";
    $usuario = "root";
    $senha = "root";
    $banco = "controle";

    $conexao = mysqli_connect($servidor, $usuario, 
            $senha, $banco);

    if(mysqli_connect_errno()){
        echo "Erro ao conectar com o banco";
        die();
    }
?>