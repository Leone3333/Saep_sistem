<?php 
session_start();

require_once("../conexao.php");
require_once("../app/Atividade.php");

use App\Atividade;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idatividades = $_POST['idatividades'];
    $idTurma = $_POST['idTurma'];
    $nomeTurma = $_POST['nomeTurma'];
    // var_dump($idatividades);
    // exit;    
    $turma = new Atividade();
    $turma->deleteAtividades($idatividades);

    header("Location: ../views/telaAtividades.php?idTurma=$idTurma&nomeTurma=$nomeTurma");    
}

?>


