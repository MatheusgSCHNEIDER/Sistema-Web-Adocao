<?php
include('config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql_code = "SELECT NOME FROM cao WHERE id = '$id'";
    $sql_query = $conexao->query($sql_code) or die('falha na execucao:'. $mysqli->error);
    $nome = $sql_query->fetch_assoc(); 
    $string = implode(";", $nome);
    
    
} else {
    // Redirecionar para a página principal ou mostrar uma mensagem de erro
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <title>Confirma_exclusão</title>
    <style>
        .exclusao{
            background-color: rgba(0, 0, 0, 0.88);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
        }
        .botao_sim {
            color: white;
            background-color: red;
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 10px;   
        }
        .botao_nao {
            background-color: rgb(199, 199, 5);
            text-align: center;
            padding: 10px; 
            border-radius: 10px;  
        }
        .botao_sim a{
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 14pt;
        }
        .botao_nao a{
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 14pt;
        }
        
        
    </style>
</head>
<body>
    <div class="exclusao">
        <h2>Tem certeza que deseja excluir <?php echo $string ?>?</h2>
        <div class= 'botao_sim'>
            <a href='delete.php?id=$user_data[ID]'>
                <?php echo "<a href='delete.php?id=$id'>Sim, excluir</a> ";?>
            </a>
        </div>
        <div class="botao_nao">
        <a>
            <?php echo "<a href='listagem.php'>Cancelar</a>";?>
        </a>
        </div>
         
    </div>
    
</body>
</html>