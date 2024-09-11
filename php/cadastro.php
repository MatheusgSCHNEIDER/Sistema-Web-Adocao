<?php
// if (isset($_POST['submit'])){
//     print_r($_POST['nome']);
//     print_r($_POST['raca']);
//     print_r($_POST['sexo']);
//     print_r($_POST['pelo']);
//     print_r($_POST['porte']);
//     print_r($_POST['idade']);
//     print_r($_POST['img']);

// }
session_start();
    if((!isset($_SESSION['nome']) == true) && (!isset($_SESSION['senha']) == true)){
        header('Location: login.php');
    }
include_once('config.php');
if (isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $raca = $_POST['raca'];
    $sexo = $_POST['sexo'];
    $pelo = $_POST['pelo'];
    $porte = $_POST['porte'];
    $idade = $_POST['idade'];
    $sts = $_POST['sts'];
     // inserção de imagem codigo gpt
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $file = $_FILES['img']['tmp_name'];
        $imgData = addslashes(file_get_contents($file)); // Lê os dados binários da imagem
        $nomeImg = $_FILES['img']['name'];
        // Insere os dados binários no campo BLOB
        $result = mysqli_query($conexao, "INSERT INTO cao (NOME, RACA, SEXO, PELO, PORTE, IDADE, sts, foto, nome_img) 
        VALUES ('$nome', '$raca', '$sexo', '$pelo', '$porte', '$idade', '$sts', '$imgData', '$nomeImg')");
        
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Cadastro Pet</title>
</head>
<style>
body{
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(45deg, green, rgb(199, 199, 5));
}
input{
    padding: 15px;
    font-size: 15px;
    border-radius: 10px;
}
select{
    padding: 15px;
    font-size: 15px;
    border-radius: 10px;
}
.botao button{
    padding: 15px;
    border-radius: 10px;
    font-size: 20px;
    color: white;
    width: 100%;
    background-color: green;
    cursor: pointer;
     }
.botao button :hover {
background-image: linear-gradient(45deg, green, rgb(199, 199, 5));
}
.form{
    background-color: rgba(0, 0, 0, 0.88);
    position: absolute;
    top: 58%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 15px;
    border-radius: 10px;
    color: white;
}
</style>
<body>
<div id="menu-horizontal">
    <ul>
        <li><a href="../index.html">Voltar a Pagina Inicial</a></li>
        <li><a href="listagem.php">Alterar ou Excluir Cadastro Existente</a></li>
        <li><a href="dirAdmin.php">Voltar ao Direcionamento</a></li>
    </ul>
<div class= 'form'>
    <h2>Cadastro de Animal</h2>
    <form action="cadastro.php" method="POST" enctype="multipart/form-data">
        <fieldset>   
            <input type="text" placeholder="Nome Animal" name="nome" id="nome" required>   
            <br><br>
            <input type="text" placeholder="Raça" name="raca" id="raca" required>
            <br><br>
            <select id="sexo" name="sexo" required>
                <option value="" selected>Sexo</option>
                <option value="Macho">Macho</option>
                <option value="Femea">Femea</option>
            </select>
            <br><br>
            <select id="pelo" name="pelo" required>
                <option value="" selected>Tipo de pelo</option>
                <option value="Curto">Curto</option>
                <option value="Medio">Medio</option>
                <option value="Longo">Longo</option>
            </select>
            <br><br>
            <select id="porte" name="porte" required>
                <option value="" selected>Porte do Animal</option>
                <option value="Pequeno 2,5 a 15 kg">Pequeno 2,5 a 15 kg</option>
                <option value="Medio 15 a 25 kg">Medio 15 a 25 kg</option>
                <option value="Grande 25 a 45 kg">Grande 25 a 45 kg</option>
            </select>
            <br><br>
            <input type="text" placeholder="Idade" name="idade" id="idade" required>
            <br><br>
            <select id="sts" name="sts" required>
                <option value="Disponivel para Adoção" selected>Disponivel para Adoção</option>
                <option value="Adotado">Adotado</option>
            </select>
            <br><br>
            <label>Escolha a Foto do Animal:</label>
            <input type="file" name="img" id="img" accept="image/*">
            <div class="botao">
                <button type="submit" name='submit' id="submit">Gravar</button>
            </div>
            
        </fieldset>
    </form>

</div>
    
</body>
</html>