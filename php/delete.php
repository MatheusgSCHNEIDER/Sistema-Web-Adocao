<?php

if (!empty($_GET['id'])){
    $id = $_GET['id'];
    include_once('config.php');
    
    $select = "SELECT * FROM cao WHERE ID = $id";
    $resultado = $conexao->query($select);

    if($resultado->num_rows > 0){
        $delete = "DELETE FROM cao WHERE ID = $id";
        $resultadoDelete = $conexao->query($delete);   
}
else{
    echo 'cadastro nao encontrado';
}
header('Location: listagem.php');
}
?>