<?php
include_once('config.php');
if(isset($_POST['update'])){
    $nome = $_POST['nome'];
    $raca = $_POST['raca'];
    $sexo = $_POST['sexo'];
    $pelo = $_POST['pelo'];
    $porte = $_POST['porte'];
    $idade = $_POST['idade'];
    $sts = $_POST['sts'];
    $id = $_POST['id'];
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $file = $_FILES['img']['tmp_name'];
        $imgData = addslashes(file_get_contents($file));
        $nomeImg = $_FILES['img']['name'];
    }

    $sqlUpdate = "UPDATE cao set NOME='$nome',RACA='$raca',SEXO='$sexo',PELO='$pelo',PORTE='$porte',IDADE='$idade',sts='$sts',foto='$imgData', nome_img='$nomeImg'
    WHERE ID= '$id'";
    $resultadoUpdate = $conexao->query($sqlUpdate);
}
header('Location: listagem.php');


?>