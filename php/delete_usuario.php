<?php

if (!empty($_GET['id'])){
    $id = $_GET['id'];
    include_once('config.php');
    
    $select = "SELECT * FROM usuarios WHERE ID = $id";
    $resultado = $conexao->query($select);

    if($resultado->num_rows > 0){
        $delete = "DELETE FROM usuarios WHERE ID = $id";
        $resultadoDelete = $conexao->query($delete);   
}
else{
    echo 'cadastro nao encontrado';
}
header('Location: usuario.php');
}
?>