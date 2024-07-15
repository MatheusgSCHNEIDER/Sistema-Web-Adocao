<?php

if (!empty($_GET['id'])){
    $id = $_GET['id'];
    include_once('config.php');
    
    $select = "SELECT * FROM cao WHERE ID = $id";
    $resultado = $conexao->query($select);

    if($resultado->num_rows > 0){
        while($user_data = mysqli_fetch_assoc($resultado)){
            $nome = $user_data['NOME'];
            $raca = $user_data['RACA'];
            $sexo = $user_data['SEXO'];
            $pelo = $user_data['PELO'];
            $porte = $user_data['PORTE'];
            $idade = $user_data['IDADE'];
            $sts = $user_data['sts'];
            $img = $user_data['foto'];
        }
       
    }
    else{
        echo 'cadastro não encontrado';
        header('Location: listagem.php');
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Alteacao</title>
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
.botao input{
    padding: 15px;
    border-radius: 10px;
    font-size: 20px;
    color: white;
    width: 100%;
    background-color: green;
    cursor: pointer;
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
        </ul>
    <div class= 'form'>
    <h2>Alterar Cadastro:</h2>
    <form action="update.php" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $id;?>">  
            <input type="text" placeholder="Nome Animal" name="nome" id="nome" value="<?php echo $nome;?>">   
            <br><br>
            <input type="text" placeholder="Raça" name="raca" id="raca" required value="<?php echo $raca; ?>">
            <br><br>
            <select id="sexo" name="sexo">
                <option value="Macho">Macho</option>
                <option value="Femea">Femea</option>
            </select>
            <script>
                document.getElementById('sexo').value = "<?php echo $sexo; ?>"; //seleciona o valor conforme variavel
            </script>
            <br><br>
            <select id="pelo" name="pelo" required>
                <option value="" selected>Tipo de pelo</option>
                <option value="Curto">Curto</option>
                <option value="Medio">Medio</option>
                <option value="Longo">Longo</option>
            </select>
            <script>
                document.getElementById('pelo').value = "<?php echo $pelo; ?>"; //seleciona o valor conforme variavel
            </script>
            <br><br>
            <select id="porte" name="porte" required>
                <option value="" selected>Porte do Animal</option>
                <option value="Pequeno 2,5 a 15 kg">Pequeno 2,5 a 15 kg</option>
                <option value="Medio 15 a 25 kg">Medio 15 a 25 kg</option>
                <option value="Grande 25 a 45 kg">Grande 25 a 45 kg</option>
            </select>
            <script>
                document.getElementById('porte').value = "<?php echo $porte; ?>"; //seleciona o valor conforme variavel
            </script>
            <br><br>
            <input type="text" placeholder="Idade" name="idade" id="idade" value="<?php echo $idade; ?>">
            <br><br>
            <select id="sts" name="sts" required>
                <option value="Disponivel para Adoção" selected>Disponivel para Adoção</option>
                <option value="Adotado">Adotado</option>
            </select>
            <script>
                document.getElementById('sts').value = "<?php echo $sts; ?>"; //seleciona o valor conforme variavel
            </script>
            <br><br>
            <!-- <label>Escolha a Foto do Animal:</label>
            <input type="file" name="img" id="img" accept="image/*"value="<?php echo $img; ?>">
            <div class="botao">
                <input type="submit" name='update' id="update">
            </div> -->
            
        </fieldset>
    </form>

</div>
    
</body>
</html>