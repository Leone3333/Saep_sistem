<?php
session_start();

require_once("../conexao.php");
require_once("../app/Atividade.php");

use App\Atividade;
// var_dump($idTurma);
// var_dump($descricao);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idTurma = $_POST['idTurma'];
    $nomeTurma = $_POST['nomeTurma'];   
    $descricao = $_POST['descricao'];

    $atividade = new Atividade();
    $atividade->creatAtividades($descricao, $idTurma);

    header("Location: ../views/telaAtividades.php?idTurma=$idTurma&nomeTurma=$nomeTurma");    
    exit();
} else {
    # code...
}
