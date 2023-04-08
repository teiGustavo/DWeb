<?php

    function sorteio(){
        $palavra = array("pasta", "areia", "casal", "limao", "adaga");
        $quant = count($palavra);
        $sorte = rand(0, $quant-1);
        return $palavra[$sorte];
    }

    function verifica($palavra, $letras){
        //verifica se a letra existe
        for($i=0; $i<5; $i++){
            $achei = false;
            $posicao = false;
            for($j=0; $j<5; $j++){
                if(strtolower($palavra[$j])==strtolower($letras[$i])){
                    $achei=true;
                    if($i==$j){
                        $posicao = true;
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

    }

?>