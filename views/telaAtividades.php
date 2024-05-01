<?php
require_once("../conexao.php");
require_once("../app/Atividade.php");

use App\Atividade;

if (isset($_POST['idTurma'])) {

    $idTurma = $_POST['idTurma'];
    $nomeTurma = $_POST['nomeTurma'];
    var_dump($idTurma);
    // var_dump($nomeTurma);
    // exit;

    $atividade = new Atividade();
    $atividades = $atividade->listAtividades($idTurma);
} elseif (isset($_GET['idTurma'])) {
    $idTurma = $_GET['idTurma'];
    $nomeTurma = $_GET['nomeTurma'];
    // var_dump($idTurma);
    // var_dump($nomeTurma);
    // exit;

    $atividade = new Atividade();
    $atividades = $atividade->listAtividades($idTurma);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="../style/listTurmas.css">
</head>
<?php if (!empty($atividades)) { ?>

    <body>
        <header>
            <nav>
                <ul class="nav-list">
                    <li style="color: white;">Turma: <?php echo $nomeTurma ?></li>
                    <li><a href="telaProfessor.php">Home</a></li>
                    <li><a href="../logaut.php">Logout</a></li>

                    <form action="createAtividade.php" method="post">
                        <input type="hidden" name="idTurma" value="<?php echo $idTurma; ?>">
                        <input type="hidden" name="nomeTurma" value="<?php echo $nomeTurma; ?>">
                        <button type="submit" class="update"> Cadastrar atividade</button>
                    </form>
                </ul>
            </nav>
        </header>

        <div class="filter">
        </div>
        <table>
            <tr>
                <th>Codigo atividade</th>
                <th>Descrição</th>
                <th>Deletar</th>
            </tr>

            <?php if ($atividades->num_rows > 0) {
                while ($line = $atividades->fetch_assoc()) {
            ?>

                    <tr>
                        <td><?php echo $line["idatividades"] ?></td>
                        <td><?php echo $line["descricao"] ?></td>
                        <td>
                            <form action="../control/deleteAtividade.php" method="post">
                                <input type="hidden" name="idatividades" value="<?php echo $line["idatividades"] ?>">
                                <input type="hidden" name="idTurma" value="<?php echo $idTurma; ?>">
                                <input type="hidden" name="nomeTurma" value="<?php echo $nomeTurma; ?>">
                                <button type="submit" class="deleteButton">Delete</button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            } ?>
        </table>
    </body>

</html>

<?php
} else {
    echo "";
} ?>