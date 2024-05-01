<?php

namespace App;

use Config\Conection;

require_once("../conexao.php");

class Turma
{
    private $nome;
    private $idProfessor;

    public function creatTurma($nome, $idProfessor)
    {
        $conexao = Conection::conect();
    
        $this->nome = $nome;
        $this->idProfessor = $idProfessor;
    
        $turma = $conexao->prepare("INSERT INTO turmas (nome, professores_idprofessores) VALUES (?, ?)");
        $turma->bind_param("si", $this->nome, $this->idProfessor);
        $turma->execute();

        header("Location= ../views/telaProfessor");
    }

    public function listTurmas($idProfessor)
    {
        $conexao = Conection::conect();

        $turma = $conexao->query("SELECT idturmas, nome, professores_idprofessores
        FROM turmas 
            WHERE professores_idprofessores = $idProfessor");

        return $turma;        
    }

    public function deleteTurmas($idTurma)
    {
        $conexao = Conection::conect();
        $turma = $conexao->prepare("DELETE FROM turmas WHERE idturmas = ?");
        $turma->bind_param("i", $idTurma);
        $turma->execute();
    }

    public function updateTurmas($idTurma, $nome)
    {
        $conexao = Conection::conect();
        $turma = $conexao->prepare("UPDATE turmas SET nome = ?,
        WHERE idturmas = ?");
        $turma->bind_param("si", $nome);
        $turma->execute();
        
    }
}


