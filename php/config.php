<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'site_adocao';

$conexao = new mysqli ($dbHost,$dbUsername,$dbPassword,$dbName);


if($conexao->connect_errno)
 {
    echo 'erro';
 }
