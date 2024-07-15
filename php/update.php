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
    $img = $_POST['foto'];
    $id = $_POST['id'];

    $sqlUpdate = "UPDATE cao set NOME='$nome',RACA='$raca',SEXO='$sexo',PELO='$pelo',PORTE='$porte',IDADE='$idade',sts='$sts',foto='$img'
    WHERE ID= '$id'";
    $resultadoUpdate = $conexao->query($sqlUpdate);
    echo $sqlUpdate;
}
header('Location: listagem.php');


?>