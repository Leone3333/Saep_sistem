<?php session_start(); 

$idTurma = $_POST['idTurma'];
$nomeTurma = $_POST['nomeTurma'];
// var_dump($idTurma);
 var_dump($nomeTurma);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saep pratico</title>
    <link rel="stylesheet" href="../style/index.css">
</head>

<body>
    <div id="successAlert" style="display: none;"></div>
    <header>
        <nav>
            <ul class="nav-list">
                <li><a href="telaProfessor">Home</a></li>
                <li><a href="../logaut.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <form action="../control/createAtividade.php" method="post">
        <div class="right">
            <div class="card-login">

                <h2>Descrição da atividade</h2>

                <div class="inputs">
                    <label for="">Descreva as atividades</label>
                    <input type="text" name="descricao" placeholder="Digite sobre a atividade">
                </div>
                <input type="hidden" name="idTurma" value="<?php echo $idTurma; ?>">
                <input type="hidden" name="nomeTurma" value="<?php echo $nomeTurma; ?>">
            
                <button href="" class="btn-login">Submit</button>

            </div>
        </div>
    </form>

    </script>
</body>

</html>