<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) { //Verifica se o campo de email está vazio
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) { //Verifica se o campo senha está vazio
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']); //Meio de proteção
        $senha = $mysqli->real_escape_string($_POST['senha']); //Meio de proteção

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"; //Procura o usuário indicado no banco de dados
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows; //Verifica a quantidade de match que tem no texto incerido e no banco de dados

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Acesse sua conta</h1>
    <form action="" method="POST">
        <p>
            <label>E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>
</html>