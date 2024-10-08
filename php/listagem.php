<?php
session_start();
if((!isset($_SESSION['nome']) == true) && (!isset($_SESSION['senha']) == true)){
    header('Location: login.php');
}
include('config.php');

$sqltds = "SELECT ID, NOME, RACA, SEXO, PELO, PORTE, IDADE, sts, nome_img FROM cao ORDER BY id";
$resultado = $conexao->query($sqltds);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Lista Cadastros</title>
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
            border-color: rgb(199, 199, 5);
        }
        .table-bg{
        font-size: 18px;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 15px 15px 15px 15px;
    }
    </style>
</head>
<body>
<div id="menu-horizontal">
            <ul>
                <li><a href="../index.html">Voltar a Pagina Inicial</a></li>
                <li><a href="cadastro.php">Fazer Novo Cadastro</a></li>
                <li><a href="dirAdmin.php">Voltar ao Direcionamento</a></li>
            </ul>
    <div class= "m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">RACA</th>
                    <th scope="col">SEXO</th>
                    <th scope="col">PELO</th>
                    <th scope="col">PORTE</th>
                    <th scope="col">IDADE</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">IMAGEM</th>
                    <th scope="col">Alterar/Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($resultado)){
                        echo "<tr>";
                        echo "<td>".$user_data['ID']."</td>";
                        echo "<td>".$user_data['NOME']."</td>";
                        echo "<td>".$user_data['RACA']."</td>";
                        echo "<td>".$user_data['SEXO']."</td>";
                        echo "<td>".$user_data['PELO']."</td>";
                        echo "<td>".$user_data['PORTE']."</td>";
                        echo "<td>".$user_data['IDADE']."</td>";
                        echo "<td>".$user_data['sts']."</td>";
                        echo "<td>".$user_data['nome_img']."</td>";
                        echo "<td> <a class= 'btn btn-sm btn-primary' href='alteracao.php?id=$user_data[ID]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                        </svg>
                        </a>
                        <a class= 'btn btn-sm btn-danger' href='confirm_delete.php?id=$user_data[ID]'>
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
</body>
</html>