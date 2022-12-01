<?php
include_once("./connexao.php");

$dados_user = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if(!empty($dados_user['user_name']) and !empty($dados_user['user_name'])){
    echo "<h1>Estou dentro nome user</h1>";
    $arquivo = $_FILES['file_user'];

    $query_usuario = "INSERT INTO usuarios(user_name, user_pass, user_file, data_criacao)  VALUES(:user_name, :user_pass, 
      :user_file, NOW())";

    $cadastro_usuario = $conn->prepare($query_usuario);
    $cadastro_usuario->bindParam(":user_name", $dados_user['user_name'], PDO::PARAM_STR);
    $cadastro_usuario->bindParam(":user_pass", $dados_user['user_pass'],  PDO::PARAM_STR);
    $cadastro_usuario->bindParam(":user_file", $arquivo['name'],  PDO::PARAM_STR);
    $cadastro_usuario->execute();

    // verificar se foi cadastrado com Sucesso
    if($cadastro_usuario->rowCount()){
        echo "<p style='color:green'>Usuario cadastrado com Sucesso</p>";

    }else{
        echo "<p style='color:red'>Usuario Não cadastrado</p>";
        
    }

    // verificar e guardar img no servidor caso tenha, se não tiver usar o default
    if((isset($arquivo['name'])) and (!empty($arquivo['name']))){
        echo "<h1>Estou dentro do  arquivo </h1>";

        // recupera o ultimo id de usuario
        $last_id_user = $conn->lastInsertId();

        // diretorio de imagem do cliente
        $diretorio_img = "../img/$last_id_user/";

        // salvar  permissão 0755
        mkdir($diretorio_img, 0755);

        // upload da img
        $nome_do_arquivo = $arquivo['name'];
        move_uploaded_file($arquivo['tmp_name'], $diretorio_img . $nome_do_arquivo);
    }    
    // redireciona para a pagina de lista de usuarios cadastrados
    header("Location: ../listarusers.php");

}else{
    echo "<h1>nada a declarar</h1>";

}


















?>