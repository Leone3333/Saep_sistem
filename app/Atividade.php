<?php

namespace App;

use Config\Conection;

require_once("../conexao.php");

class Atividade
{
    private $descricao;
    private $idTurma;

    public function creatAtividades($descricao, $idTurma)
    {
        $conexao = Conection::conect();
    
    
        $this->descricao = $descricao;
        $this->idTurma = $idTurma;
    
        $Atividade = $conexao->prepare("INSERT INTO Atividades(descricao, turmas_idturmas) VALUES (?,?)");
        $Atividade->bind_param("si", $this->descricao, $this->idTurma);
        $Atividade->execute();

        header("Location= ../views/telaAtividade.php");
    }

    public function listAtividades($idTurma)
    {
        $conexao = Conection::conect();

        $Atividade = $conexao->query("SELECT idatividades, descricao
        FROM Atividades WHERE turmas_idturmas = $idTurma");

        return $Atividade;        
    }

    public function deleteAtividades($idAtividade)
    {
        $conexao = Conection::conect();
        $Atividade = $conexao->prepare("DELETE FROM Atividades WHERE idAtividades = ?");
        $Atividade->bind_param("i", $idAtividade);
        $Atividade->execute();
    }
}


