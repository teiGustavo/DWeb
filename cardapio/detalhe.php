<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio detalhado</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="painel">
        <?php
            if (!isset($_SESSION)){
                session_start();
            }

            if($_SESSION["logado"] == 0){
                header("location: index.php");
            }

            $id = $_GET["id"];
        ?>
        <!--Listando os dados do banco-->
        <?php
            include "conexao.php";
            $sql = "SELECT idcardapio, DATE_FORMAT(data, '%d de %M de %Y') as dataF, diasemana, cardapio, observacao, totalcurtida FROM cardapio WHERE idcardapio=$id";
            $resultado = mysqli_query($conexao, $sql);
            while($linha=mysqli_fetch_array($resultado)){
        ?>
        <h2><?php echo $linha["diasemana"]; ?></h2>
        <h2><?php echo $linha["dataF"]; ?></h2>
        <br><p><b>Cardápio:</b><br> <?php echo $linha["cardapio"]; ?></p>
    </div>

    <div class='painel2'>
        
        <div class="painel2-esquerdo">
            <!--Curtir-->
            <p>Se você gostou, curta para nos dar seu retorno :)</p>
            <!--div class="divcurtir"-->
                <a href="curtir.php?id=<?php echo $id; ?>&aluno=1" class="curtir">
                    <?php echo $linha["totalcurtida"];?><img src="https://www.pngmart.com/files/15/Heart-Box-PNG-Photos.png"></a>
                <?php } ?>
            <!--/div-->
        </div>
        
        <div class="painel2-direito">
            <!--Comentar-->
            <p>Não gostou ou tem sugestões?</p>
            <p>Nos conte abaixo!</p>
        </div>

    </div>    
            
    <div class="painel2">
        <div class="painel2-esquerdo">
            <form method="post">
                <label class='comentario'>Deixe seu feedback:</label>
                <br>
                <textarea class='label_comentario' name="txtcomentario"></textarea>
                <br>
                <input class='btn' type="submit" name="btComentar" value="Comentar">
                <br><br>
            </form>
        </div>

        <div class="painel2-direito">
            <p>Opiniões dos nossos clientes:</p>
            <br>
            <?php
                if(isset($_POST["btComentar"])){
                    $comentario = $_POST["txtcomentario"];
                    $sql = "INSERT INTO comentario(cardapio_idcardapio, 
                    aluno_idaluno, comentario) VALUES ($id, 1, '$comentario')";
                    mysqli_query($conexao, $sql);
                }

                //exibir comentários
                $sql = "SELECT C.comentario, A.nome FROM comentario as C, aluno as A WHERE cardapio_idcardapio=$id AND A.idaluno = C.aluno_idaluno";
                $resultado = mysqli_query($conexao, $sql);
                while($linha=mysqli_fetch_array($resultado)){
                    echo "<div class='comentario'>";
                        echo $linha["nome"].": ";
                        echo $linha["comentario"];
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    
</body>
</html>