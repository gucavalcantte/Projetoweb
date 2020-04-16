<?php

    header("Content-Type: application/json; charset=UTF-8");

    require_once ('../db/conexao.php');

    if (isset($_GET)) {
        if (!isset($_GET['curso'])) {
            echo json_encode(["success" => false, "message" => "É obrigatório inserir o curso."]);
            return;
        }

        if (!isset($_GET['semestre'])) {
            echo json_encode(["success" => false, "message" => "É obrigatório inserir o semestre."]);
            return;
        }

        $curso = $_GET['curso'];
        $semestre = (int) $_GET['semestre'];

        $sql = "SELECT * FROM curso WHERE curso = '$curso' AND semestre = '$semestre'";

        $query = $connection->query($sql);

        $rows = $query->num_rows;

        if ($rows === 0) {
            echo json_encode(["success" => false, "message" => "Nenhum curso encontrado."]);
            return;
        }

        if ($rows > 0) {
            $results = [];

            while ($dados = $query->fetch_array()) {
                array_push($results, ["id" => (int) $dados["id"], "curso" => $dados["curso"]]);
            }

            echo json_encode(["success" => true, "data" => $results]);
        }
    }