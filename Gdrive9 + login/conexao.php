<?php
   define('HOST', 'localhost');
   define('USERNAME', 'root');
   define('PASSWORD', 'root');
   define('DB', 'login');

   $conexao = mysqli_connect(HOST, USERNAME, PASSWORD, DB) or die("Não foi possivel conectar!");
?>