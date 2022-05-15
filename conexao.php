<?php

$usuario = 'root';
$senha = '';
$database = 'login'; //Criar um repositório local com o nome: login
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}