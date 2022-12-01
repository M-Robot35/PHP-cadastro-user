<?php
    session_start();
    
    include_once("./components/header.php"); 
    include_once('./banco/connexao.php') ;  
    ob_start();
?>

<body>
    <h1>Visualizar</h1>
    <a href="./index.php">Cadastrar usuario</a><br>
    <a href="./listarusers.php">Listar usuario</a><br><br>

    <?php 

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id)){
        // "SELECT id, user_name, user_pass, user_file, data_criacao FROM usuarios WHERE id=:id";

        $query_usuario = "SELECT * FROM usuarios WHERE id=:id LIMIT 1";
        $result_usuario = $conn->prepare(($query_usuario));
        $result_usuario->bindParam(":id", $id, PDO::PARAM_INT);
        $result_usuario->execute();

        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        // var_dump($row_usuario);
        extract($row_usuario);
        echo "ID: " . $id . "<br>";
        echo "Nome: " . $user_name . "<br>";
        echo "Password: " . $user_pass . "<br>";
        echo "Imagem Name: " . $user_file . "<br>";
        echo "Data de Criação: " .date('d/m/Y H:i:s', strtotime($data_criacao)) . "<br>";

        if((!empty($user_file)) and (file_exists("img/$id/$user_file"))){
            echo "<img src='img/$id/$user_file' style= width:500px> <br>";
            echo "<a href='img/$id/$user_file' download >Download da Imagem</a><br><br>"; // usuario pode fazer o download da imagem
        }else{
            echo "<img src='img/semFoto.jpg' style= width:150px>";
        }

        
    }else{
        // se não ouver os requisitos ele redireciona para a pagina anterior
        $_SESSION['msg']= '<h1 style= background:red;>Dados do usuario não encontrados</h1>';
        header("Location: listarusers.php", true);
    }

        
    ?>
    
</body>


</form>


<?php     
    include_once("./components/footer.php")
?>











