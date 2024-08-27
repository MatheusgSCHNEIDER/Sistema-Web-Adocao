<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Busca Pet</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, green, rgb(199, 199, 5));
        }
        .voltar a{
            color: black;   
        }
    #pesquisa{
        width: 300px;
    }
    #nav{
        border-radius: 10px;
        background-color: rgb(0, 0, 0, 0.4);
    }
    .vitrine{
    display: grid;
    grid-template-columns: 1fr 1fr; /* Duas colunas de tamanho igual */
    }
    .vitrine input{
        color: black;
        text-align: right;
    }
    .dados{
    margin-top: 15px;
    background-color: rgba(0, 0, 0, 0.88);
    padding: 15px;
    border-radius: 10px;
    width: 300px;
    color: white;
    position: absolute;
    left: 30%;
    
    }
    .dados input {
    text-align: center;
    border-radius: 10px;
    background-color: whitesmoke;   
    }
    #imagem{
    margin-top: 15px;
    background-color: rgba(0, 0, 0, 0.88);
    padding: 15px;
    border-radius: 10px;
    width: 400px;
    color: white;
    margin-left: 95%;
    
    }
    #imagem img{
        width: 370px;
        height: 400px;
        border-radius: 10px;   
    }
    #imagem label{
        width: 100%;
        text-align: center;
    }
    #mail{
        width: 100%;
        background-image: linear-gradient(45deg, green, rgb(199, 199, 5))
        
    }
    
    </style>
</head>
<body>
    <div id="menu-horizontal">
        <ul>
        <li><a 
            <nav class="navbar" id="nav">
        <form class="form-inline" method="POST" action="busca.php">
          <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" id="pesquisa" name="pesquisa" value="<?php echo isset($_POST['pesquisa']) ? htmlspecialchars($_POST['pesquisa']) : ''; ?>">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </nav>
        </a></li>
            <li><a href="../index.html#como">Como adotar?</a></li>
            <li><a href="../index.html#contato">Contato</a></li>
            <li><a href="login.php">Sou Administrador</a></li>
        </ul>
        <!-- exibe os cadastros ao abrir a pagina, somente com status para adoção -->
        <?php
        if (empty($_POST['submit']) && empty($_POST['pesquisa'])){
            $sqltds = "SELECT * FROM cao WHERE sts = 'Disponivel para Adoção'";
            $resultado = $conexao->query($sqltds);
            $resultados = $resultado->num_rows; 
            for ($i = 0; $i < $resultados; $i++) {
                while($user_data = mysqli_fetch_assoc($resultado)){
                    $id = $user_data['ID'];
                    $nome = $user_data['NOME'];
                    $raca = $user_data['RACA'];
                    $sexo = $user_data['SEXO'];
                    $pelo = $user_data['PELO'];
                    $porte = $user_data['PORTE'];
                    $idade = $user_data['IDADE'];
                    $sts = $user_data['sts'];
                    $img = $user_data['foto'];
                    $imgBase64 = base64_encode($img);
                    ?> 
            <form action="formAdocao.php" enctype="multipart/form-data">
                <div class="vitrine">
                <div class="dados">
                    <label>Nome:</label>
                    <input type="hidden" name="id" value="<?php echo $id;?>">  
                    <input value="<?php echo $nome;?>" disabled=''>
                    <br><br>  
                    <label>Raça:</label>
                    <input value="<?php echo $raca;?>" disabled=''>
                    <br><br>  
                    <label>Sexo:</label>
                    <input value="<?php echo $sexo;?>" disabled=''>
                    <br><br>
                    <label>Pelo:</label>
                    <input value="<?php echo $pelo;?>" disabled=''>
                    <br><br>
                    <label>Porte:</label>
                    <input value="<?php echo $porte;?>" disabled=''>
                    <br><br>
                    <label>Idade:</label>
                    <input value="<?php echo $idade;?>" disabled=''>
                    <br><br>
                    <label>Status:</label>
                    <input value="<?php echo $sts;?>" disabled=''>
                    <br><br>
                    <input type="submit" name='mail' id="mail" value="Quero Adotar">
                </div>
                <div class="imagem" id="imagem">
                    <label>Olá! eu sou <?php echo $nome;?> </label>
                    <img <?php echo '<img src="data:image/jpeg;base64,' . $imgBase64 . '" alt="Foto do Animal">'; ?>
                </div>  
                </div>
            </form>
            <?php
                }
            }
        }
            ?>
         <!-- exibe somente os cadastros pesquisados -->
         <?php
        if (isset($_POST['pesquisa'])){
            $contBusca = $_POST['pesquisa'];
            
            $sqlBuscaPesquisa = "SELECT * FROM cao WHERE NOME LIKE '%$contBusca%'AND sts = 'Disponivel para Adoção'  OR RACA LIKE '%$contBusca%' AND sts = 'Disponivel para Adoção' OR SEXO LIKE '%$contBusca%' AND sts = 'Disponivel para Adoção' OR PELO LIKE '%$contBusca%' AND sts = 'Disponivel para Adoção' OR PORTE LIKE '%$contBusca%' AND sts = 'Disponivel para Adoção' OR IDADE LIKE '%$contBusca%' AND sts = 'Disponivel para Adoção'";
            $resultadoPesquisa = $conexao->query($sqlBuscaPesquisa);
            $resultadosPesquisa = $resultadoPesquisa->num_rows;
            if($resultadosPesquisa > 0){  
                for ($i = 0; $i < $resultadosPesquisa; $i++) {
                    while($user_data = mysqli_fetch_assoc($resultadoPesquisa)){
                        $id = $user_data['ID'];
                        $nome = $user_data['NOME'];
                        $raca = $user_data['RACA'];
                        $sexo = $user_data['SEXO'];
                        $pelo = $user_data['PELO'];
                        $porte = $user_data['PORTE'];
                        $idade = $user_data['IDADE'];
                        $sts = $user_data['sts'];
                        $img = $user_data['foto'];
                        $imgBase64 = base64_encode($img);             
                    ?>
            <form action="formAdocao.php">
                <div class="vitrine">
                <div class="dados">
                    <label>Nome:</label>
                    <input type="hidden" name="id" value="<?php echo $id;?>">  
                    <input value="<?php echo $nome;?>" disabled=''>
                    <br><br>  
                    <label>Raça:</label>
                    <input value="<?php echo $raca;?>" disabled=''>
                    <br><br>  
                    <label>Sexo:</label>
                    <input value="<?php echo $sexo;?>" disabled=''>
                    <br><br>
                    <label>Pelo:</label>
                    <input value="<?php echo $pelo;?>" disabled=''>
                    <br><br>
                    <label>Porte:</label>
                    <input value="<?php echo $porte;?>" disabled=''>
                    <br><br>
                    <label>Idade:</label>
                    <input value="<?php echo $idade;?>" disabled=''>
                    <br><br>
                    <label>Status:</label>
                    <input value="<?php echo $sts;?>" disabled=''>
                    <br><br>
                    <input type="submit" name='mail' id="mail" value="Quero Adotar">
                </div>
                <div class="imagem" id="imagem">
                    <label>Olá! eu sou <?php echo $nome;?></label>
                    <img <?php echo '<img src="data:image/jpeg;base64,' . $imgBase64 . '" alt="Foto do Animal">'; ?>
                </div>  
                </div>
            </form>
            <?php
                    }    
                }
            }
            else{
                echo 'Nenhum resultado encontrado';
        }
        }
            ?>
</body>
</html>