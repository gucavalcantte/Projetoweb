<?php

session_start();
require_once('db/conexao.php');

// checar a sessão 
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    die();
}

//..,pegamos aqui o id passado...
$id = $_GET["course"];

//...montamos a consulta que será realizada....
$stmt = $connection->prepare("SELECT * FROM `cursos` WHERE id = ?"); //
//passamos o id como parâmetro, do tipo i = int, inteiro...
$stmt->bind_param('s', $id);
//...mandamos executar a consulta...
$stmt->execute();
//...retornamos o resultado, e atribuímos à variável $result...
$result = $stmt->get_result();
//...atribuímos o retorno, como um array de valores,
//por meio do método fetch_assoc, que realiza um associação dos valores em forma de array...
$aux_query = $result->fetch_assoc();
//...onde aqui, nós atribuímos às variáveis.
$curso = $aux_query["curso"];
$sala = $aux_query["sala"];
$semestre = $aux_query["semestre"];
$periodo = $aux_query["periodo"];
$bloco = $aux_query["bloco"];
$andar = $aux_query["andar"];
$turma = $aux_query["turma"];
$id = $aux_query["id"];

$stmt->close();


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar curso</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <form action="./actions/editar.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Curso </label>
                        <input required name="curso" type="text" class="form-control" id="curso" value="<?= $curso ?>">
                        <small id="emailHelp" class="form-text text-muted">ex: Fisioterapia, Administração</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Semestre </label>
                        <input required name="semestre" type="text" class="form-control" id="curso" value="<?= $semestre ?>">
                        <small id="emailHelp" class="form-text text-muted">ex: 1,2,3 Semestre</small>
                    </div>
                    <div class="form-group">
                        <label>Turmas</label>
                        <input required name="turma" type="text" class="form-control" id="turmas" value="<?= $turma ?>">
                        <small class="form-text text-muted">ex: DS4P17</small>
                    </div>
                    <div class="form-group">
                    <label>Período</label>
                    <input required name="periodo" type="text" class="form-control" id="periodo" value="<?= $periodo ?>">
                    <small class="form-text text-muted">ex: Manhã, Matutino, Noturno</small>
                </div>
                    <div class="form-group">
                        <label>Sala</label>
                        <input required name="sala" type="text" class="form-control" id="salas" value="<?= $sala ?>">
                        <small class="form-text text-muted">ex: F45, G30</small>
                    </div>
                    <div class="form-group">
                        <label>Bloco</label>
                        <input required name="bloco" type="text" class="form-control" id="turmas" value="<?= $bloco ?>">
                        <small class="form-text text-muted">ex: A,B,C</small>
                    </div>
                    <div class="form-group">
                        <label>Andar</label>
                        <input required name="andar" type="text" class="form-control" id="andar" value="<?= $andar ?>">
                        <small class="form-text text-muted">ex: Térreo, 1º Andar</small>
                    </div>

                    <input type="hidden" name='id' id='id' value="<?= $id ?>">

                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>