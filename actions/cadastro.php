<?php
    session_start();
    require_once ('../db/conexao.php');

    if (isset($_POST)) {

        $curso = $_POST['curso'];
        $turmas = $_POST['turmas'];
        $sala = $_POST['sala'];
        $semestre = $_POST['semestre'];
        $bloco = $_POST['bloco'];
        $andar = $_POST['andar'];
        $periodo = $_POST['periodo'];

        $sql = "INSERT INTO cursos (curso, turma, andar, bloco, sala, semestre, periodo) values('$curso', '$turmas', '$andar', '$bloco', '$sala', '$semestre', '$periodo');";

        $query = $connection->query($sql);

        if ($query == TRUE) {
            header("Location: ../index.php");
        } else {
            echo "Erro: $connection->error";
        }
        die();
    } 