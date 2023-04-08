<?php

    function altera($post, $files, $linha, $conexao, $id) {
        $nome = $_POST["txtNome"];
        $email = $_POST["txtEmail"];
        $senha = $_POST["txtSenha"];
        $fototemp = $files["txtFoto"]["tmp_name"];
        $foto = time().$_FILES["txtFoto"]["name"];
        if (isset($post["cbInativo"])) {
            $inativo = $post["cbInativo"];
        } else {
            $inativo = 1;
        }

        if ($senha == ""){
            $senha = $linha["senha"];
        } else {
            $senha = md5($senha);
        }

        if ($files["txtFoto"]["name"] == "") {
            $foto = $linha["imagem"];
        } else {
            //Fazer o upload da imagem
            move_uploaded_file($fototemp, "img/$foto");
        }


        //Atualizar o banco
        $sql = "UPDATE usuario SET nome = '$nome', 
        email = '$email', senha = '$senha', imagem = '$foto'
        WHERE idusuario = $id;";
        if(mysqli_query($conexao, $sql)){
            echo "Usuário alterado com sucesso!";
        }else{
            echo "Erro ao alterar o usuário";
        }
    }

    function busca($id, $conexao) {
        $sql = "SELECT * FROM usuario WHERE idusuario = $id";
        $resultado = mysqli_query($conexao, $sql);
        $linha = mysqli_fetch_array($resultado);
        return $linha;
    }

?>