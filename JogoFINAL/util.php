<?php
    function sorteio(){
        $palavras = array("pasta", "areia", "casal", "limao", "adaga");
        $qtd = count($palavras);
        $sort = rand(0, $qtd-1);
        return $palavras[$sort];
    }

    function verifica($palavra, $letras){
        $qtdachei = 0;
        $tentativas = 0;
        //verifica se a letra existe
        for($i=0; $i<5; $i++){
            $achei = false;
            $posicao = false;
            for($j=0; $j<5; $j++){
                if(strtolower($palavra[$j])==strtolower($letras[$i])){
                    $achei=true;
                    if($i==$j){
                        $posicao = true;
                        $qtdachei++;
                    }
                }
            }
            if($posicao){
                $_SESSION["tentativa"] = $_SESSION["tentativa"]."<span class='posicao'>".$letras[$i]."</span>";
            }elseif($achei){
                $_SESSION["tentativa"] = $_SESSION["tentativa"]."<span class='existe'>".$letras[$i]."</span>";
            }else{
                $_SESSION["tentativa"] = $_SESSION["tentativa"]."<span class='naoExiste'>".$letras[$i]."</span>";
            }
        }

        $_SESSION["tentativa"] = $_SESSION["tentativa"]."<br>";
        echo $_SESSION["tentativa"];

        if ($qtdachei == 5){
            echo "<div class='fundo'>";
            echo "<div class='venceu'>";
            echo "<p>Parabéns!!</p>";
            echo "<a class='btn btn-primary' href='index.php' role='button' name='btJGR' autofocus>Jogar novamente</a>";
            echo "</div>";
            echo "</div>";
        }else{
            $qtd = $_SESSION["qtd"];
            if($qtd == 7){
                echo "<div class='fundo'>";
                echo "<div class='venceu'>";
                echo "<p>Infelizmente você perdeu!</p>";
                echo "<a class='btn btn-primary' href='index.php' role='button' name='btJGR' autofocus>Jogar novamente</a>";
                echo "</div>";
                echo "</div>";
           }else{
               $qtd++;
               $_SESSION["qtd"] = $qtd;
           }
        }

    }


?>