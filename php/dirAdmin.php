<?php
    
    if(! isset ($_SESSION)){
        session_start();
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direcionamento</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, green, rgb(199, 199, 5));
        }
        button{
            padding: 15px;
            border-radius: 10px;
            font-size: 20px;
            color: white;
            width: 100%;
            background-color: green;
            cursor: pointer;
        }
        </style>
</head>
<body>
    <br><br>
    <a href="cadastro.php">
        <button>Cadastrar Novo Pet</button>
    </a>
    <br><br>
    <a href="listagem.php">
        <button>Alterar Cadastro Existente</button>
    </a>
    
</body>
</html>