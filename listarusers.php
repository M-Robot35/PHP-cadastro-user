<?php
    session_start();
    include_once("./components/header.php"); 
    include_once('./banco/connexao.php');    
?>

<body>
    <h1>Listar Usuarios</h1>
    <a href="./index.php">Cadastrar usuario</a><br>
    <a href="./listarusers.php">Listar usuario</a><br><br>

    <?php 
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    // "SELECT id, user_name, user_pass, user_file, data_criacao FROM usuarios";

    // BUSCAR TODOS OS USUARIOS
    $query_usuarios = "SELECT * FROM usuarios ORDER BY id DESC";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while($row_usuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
        // var_dump($row_usuarios);
        extract($row_usuarios);
        
        echo "ID: " . $id . "<br>";
        echo "Nome: " . $user_name . "<br>";
        echo "Password: " . $user_pass . "<br>";
        echo "Imagem Name: " . $user_file . "<br>";

        // SOMENTE SE O USUARIO TIVER A IMAGEM NO BD E NO SERVER QUE SERA USADO OU IMG DEFAULT
        if((!empty($user_file)) and (file_exists("img/$id/$user_file"))){
            echo "<img src='img/$id/$user_file' style= width:150px> <br>";
            echo "<a href='img/$id/$user_file' download >Download da Imagem</a><br><br>"; // usuario pode fazer o download da imagem
        }else{
            echo "<img src='img/semFoto.jpg' style= width:150px>";
        }
        
        // visualizar usuario
        echo "<a href='visualizar.php?id=   $id'>Visualizar</a>"; 

        echo "<hr>";
    };

    
    ?>
    
</body>


</form>


<?php     
    include_once("./components/footer.php")
?>











