<?php
if (!empty($_GET['id'])){
    $id = $_GET['id'];
    include_once('config.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Formulario</title>
</head>
<style>
.envio {
    background-color: rgba(0, 0, 0, 0.80);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 15px;
    border-radius: 10px;
    color: white;
}
.envio input{
    width: 100%;
    border-radius: 15px;
}
.envio [type=text]{
height: 20px;
    }
.envio [type=email]{
height: 20px;
}      
.envio [type=submit]{
width: 102%;
color: white;
background-color: green;
border-radius: 10px;
height: 30px;
    }
.envio [type=submit]:hover{
background-image: linear-gradient(45deg, green, rgb(199, 199, 5));
} 
 
</style>
<body>
    <div id="menu-horizontal">
        <ul> 
            <li><a href="busca.php">Voltar</a></li>
            <li><a href="../index.html#como">Como adotar?</a></li>
            <li><a href="../index.html#contato">Contato</a></li>
        </ul>
    <div class="envio"> 
        <form action="https://formsubmit.co/4ea197d479f58a8203de430e8d75ced3" method="POST"> 
            <label for="email">Preencha o formulário e clique em "enviar" que vamos entrar em contato com você!</label>
            <br></br>
            <label for="email">Seu Nome:</label>
            <input type="text" name="nome" id="nome" required>
            <br></br>
            <label for="nome">Seu E-mail:</label>
            <input type="email" name="email" id="email" required>
            <br></br>
            <label for="telefone">Seu Telefone:</label>
            <input type="text" name="fone" id="fone" required>
            <br></br>
            <label for="animal">Nome do Animal:</label>
            <input type="text" name="animal" id="animal" required>
            <br></br>
            <label for="animal">Numero de Identificação do Animal:</label>
            <input type="text" name="id" id="id" value="<?php echo $id; ?>">  
            <input type="hidden" name="_captcha" value="false">
            <input type="hidden" name="_next" value="http://localhost/siteAdocao/obrigado.html"> 
            <br></br>
            <button type="submit">ENVIAR</button>
        </form>
    </div>
    
</body>
</html>