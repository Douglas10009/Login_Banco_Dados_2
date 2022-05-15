<?php

$mysqli = new mysqli("localhost" , "root" , "", "loginsystem");

if ($mysqli -> error) {
    die("Falha ao conectarao banco de dados: " . $mysqli->error);
}

?>