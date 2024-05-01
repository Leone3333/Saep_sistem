<?php
require_once ('conexao.php');

use Config\Conection;

session_start(); // Inicia a sessão (se já não estiver iniciada)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexao = Conection::conect();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta ao banco de dados para encontrar um professor com as credenciais fornecidas
    $sql = "SELECT idprofessores, nome FROM professores WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        // Login armazena as informações do professor na sessão
        $row = $result->fetch_assoc();
        $_SESSION['id_professor'] = $row['idprofessores'];
        $_SESSION['nome_professor'] = $row['nome'];

        // Redirecionar para a página do professor
        header("Location: views/telaProfessor.php");
        exit();
    } else {
        // Credenciais inválidas - redireciona para a página de login com uma mensagem de erro na URL
        $erro = urlencode("Credenciais inválidas. Por favor, tente novamente.");
        header("Location: index.php?erro=$erro");
        exit();
    }

    $conexao->close();
}
?>
