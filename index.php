<?php
    include_once("./components/header.php"); 
     
?>
<h1>Upload Foto Thiago Teles</h1>
<a href="./index.php">Cadastrar usuario</a><br>
<a href="./listarusers.php">Listar usuario</a><br><br>


<form  id="cad_usuario" action="./banco/bd_user.php" method="POST"  enctype="multipart/form-data">

    <div class="form-usuario">
        <label for="nome">Usuario: </label>
        <input type="text" name="user_name" id="nome" placeholder="Nome Completo" autofocus required >
    </div>

    <div class="form-usuario">
        <label for="pass">Password: </label>
        <input type="password" name="user_pass" placeholder="Digite sua senha" id="pass" >
    </div>

    <div class="form-usuario">
        <label for="file_user">Sua Foto: </label>
        <input type="file" name="file_user" id="file_user" >
    </div>

    <div>
        <input id="form-subimit" type="submit" value="Entrar">
    </div>
    <!-- PROGRAMA PHP -->
</form>


<?php     
    include_once("./components/footer.php")
?>











