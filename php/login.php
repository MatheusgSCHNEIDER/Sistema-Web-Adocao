<?php
include('config.php');

$erromsg = "";

if (isset($_POST['user']) || isset($_POST['senha'])) {
    if (strlen($_POST['user']) == 0) {
        $erromsg = "Preencha seu Usuário";
    } elseif (strlen($_POST['senha']) == 0) {
        $erromsg = "Preencha sua Senha";
    } else {
        $usuario = $conexao->real_escape_string($_POST['user']);
        $password = $conexao->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE nome = '$usuario' AND senha = '$password'";
        $sql_query = $conexao->query($sql_code) or die('falha na execucao:'. $conexao->error);
        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['senha'] = $password;
            header('Location: dirAdmin.php');
        } else {
            $erromsg = "Usuário ou Senha Incorreto!!";
            
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link href=""> 
    <title>Login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, green, rgb(199, 199, 5));
        }
        .login{
            background-color: rgba(0, 0, 0, 0.88);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
        }
        input{
            padding: 15px;
            font-size: 15px;
            border-radius: 10px;
        }
        button{
            padding: 15px;
            border-radius: 10px;
            font-size: 20px;
            color: white;
            width: 100%;
            background-color: green;
            cursor: pointer;
            border-color: rgb(199, 199, 5);
        }
        .erro {
        color: red;
        align-items: center;
        font-weight: bold;
        
}
    </style>
</head>
<body>
<div id="menu-horizontal">
    <ul>
        <li><a href="../index.html">Voltar a Pagina Inicial</a></li>
    </ul>
    
    <div class="login">
        <div class="erro">
            <a><?php echo $erromsg?></a>
        </div>
        <h1>Login</h1>
        <form action="" method="POST">
            <input type="text" placeholder="Usuario" name='user'>
            <br><br>
            <input type="password" placeholder="Senha" name='senha'>
            <br><br>
            <button>Enviar</button>
        </form>
    </div>
</body>
</html>