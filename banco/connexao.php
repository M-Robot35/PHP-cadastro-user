<?php


$host = "localhost";
$user = "root";
$pass = "";
$db_name = "thiagodata";
$port = "3306";

try{
    // connexao ultilizando a porta do banco de dados :
    // $conn = new PDO("mysql:host=$host; port=$port; dbname=". $db_name, $user, $pass);

    // connexão sem precisar da porta do banco de dados :
    $conn = new PDO("mysql:host=$host; dbname=". $db_name, $user, $pass);

    // echo "Connexao com Banco de dados realizada com Sucesso !!";    
} catch(PDOException $err){
    echo "Ocorreu um Erro inesperado no banco de dados". $err-> getMessage();
}



// echo "<h1>Parabéns Você esta Logado</h1>";


?>
















