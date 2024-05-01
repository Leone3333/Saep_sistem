<?php 
session_start();

require_once("../conexao.php");
require_once("../app/Turma.php");

use App\Turma;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idTurma = $_POST['idTurma'];
    // var_dump($idTurma);
    // exit;
    $turma = new Turma();
    $turma->deleteTurmas($idTurma);
    
    header("Location: ../views/telaProfessor.php");
}

?>


