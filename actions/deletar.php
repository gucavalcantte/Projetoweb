<?php
    session_start();
    require_once ('../db/conexao.php');

    if (isset($_POST['course'])) {
        $id = $_POST['course'];

    $stmt = $connection->prepare("DELETE FROM `curso` WHERE id = ?");
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Erro: $connection->error";
    }
}