<?php
    session_start();
    require_once ('../db/conexao.php');

    if (isset($_POST)) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (!$email) {
            echo "<script>alert('Insira o usuário'); window.location.href = '../login.php';</script>";
            exit();
        }

        if (!$senha) {
            echo "<script>alert('Insira a senha'); window.location.href = '../login.php';</script>";
        }

        $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";

        $query = $connection->query($sql);

        // verifica se encontrou algum usuario
        if ($query->num_rows > 0) {
            echo 'achou o user';
        } else {
            echo 'nao achou o usuario';
        }

        // armaneza os dados na variavel
        $user = $query->fetch_assoc();

        // armazenar o valor do usario na sessão
        $_SESSION['user'] = $user; 
        
        // redirecionar para página inicial
        header("Location: ../index.php");
        die();
    }