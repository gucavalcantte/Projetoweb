<?php
session_start();
require_once('../db/conexao.php');

if (isset($_POST['id'])) {

    $curso = $_POST['curso'];
    $turma = $_POST['turma'];
    $sala = $_POST['sala'];
    $semestre = $_POST['semestre'];
    $bloco = $_POST['bloco'];
    $andar = $_POST['andar'];
    $periodo = $_POST['periodo'];
    $id = $_POST['id'];

    $stmt = $connection->prepare("UPDATE `cursos` SET `curso`=?, `turma`=?, `sala`=?, `semestre`=?, `bloco`=?, `andar`=?, `periodo`=? WHERE id = ?");
    $stmt->bind_param('sssisssi', $curso, $turma, $sala, $semestre, $bloco, $andar, $periodo, $id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        $erro = $stmt->error;
    }
}
