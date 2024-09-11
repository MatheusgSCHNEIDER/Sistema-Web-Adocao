<?php
session_start();
if((!isset($_SESSION['nome']) == true) && (!isset($_SESSION['senha']) == true)){
    header('Location: login.php');
}
include('config.php');

$sqltds = "SELECT ID, nome, senha FROM usuarios ORDER BY id";
$resultado = $conexao->query($sqltds);

if (isset($_POST['submit'])){
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $result = mysqli_query($conexao, "INSERT INTO usuarios (nome, senha) VALUES ('$usuario', '$senha')");
    header("refresh:0");      
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Manutencao de Usuario</title>
    <style>
        .table-bg{
        font-size: 18px;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 15px 15px 15px 15px;
        width: 50%;  
        }
        
        .cadastro_usuario{
        background-color: rgba(0, 0, 0, 0.6);
        padding: 15px;
        border-radius: 10px;
        color: white;
        width: 40%;
        margin-top: 40px;
        margin-left: 400px;
        height: 330px;
        }
        .cadastro_usuario h2{
        text-align: center;
        margin-bottom: 20px;
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
        input{
        padding: 15px;
        font-size: 15px;
        border-radius: 10px;
        width: 100%;
        }
        select{
        padding: 15px;
        font-size: 15px;
        border-radius: 10px;
        }
        .horizontal{
        display: grid;
        grid-template-columns: 1fr 1fr; /* Duas colunas de tamanho igual */
        justify-content: center;
        }
        
    </style>
</head>
<body>
    <header id="menu-horizontal">
        <ul>
            <li><a href="../index.html">Voltar a Pagina Inicial</a></li>
            <li><a href="dirAdmin.php">Voltar ao Direcionamento</a></li>
        </ul>
    </header>
    <div class="horizontal">
        <div class="cadastro_usuario">
            <h2>Cadastrar Novo Usuário</h2>
            <form action="usuario.php" method="POST" enctype="multipart/form-data">
                <fieldset>   
                    <input type="text" placeholder="Usuario" name="usuario" id="usuario" required>   
                    <br><br>
                    <input type="text" placeholder="Senha" name="senha" id="senha" required>
                    <br><br>
                    <div class="botao">
                        <button type="submit" name='submit' id="submit">Gravar</button>
                    </div>
                </fieldset>
            </form>  
        </div>
        <div class= "m-5">
            <table class="table text-white table-bg">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">USUARIO</th>
                        <th scope="col">SENHA</th>
                        <th scope="col">Alterar/Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($user_data = mysqli_fetch_assoc($resultado)){
                            echo "<tr>";
                            echo "<td>".$user_data['ID']."</td>";
                            echo "<td>".$user_data['nome']."</td>";
                            echo "<td>".$user_data['senha']."</td>";
                            // echo "<td> <a class= 'btn btn-sm btn-primary' href='alteracao.php?id=$user_data[ID]'>
                            // <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            //     <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                            // </svg>
                            // </a>
                            echo "<td>
                            <a class= 'btn btn-sm btn-danger' href='delete_usuario.php?id=$user_data[ID]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                                </svg>
                            </a>
                            </td>";
                            echo "</tr>";
                            }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>