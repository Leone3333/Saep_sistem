<?php 
session_start();

require_once("../conexao.php");
require_once("../app/Turma.php");
$nomeTurma = $_POST['nome'];
// var_dump($nomeTurma);
// var_dump($_SESSION['id_professor']);
// exit;

use App\Turma;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeTurma = $_POST["nome"];
    $idProfessor = $_SESSION['id_professor'];

    $turma = new Turma();
    $turma->creatTurma($nomeTurma, $idProfessor);
    
    header("Location: ../views/telaProfessor.php");
}

?>


