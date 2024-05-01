    <?php
    require_once("../conexao.php");
    require_once("../app/Turma.php");

    use App\Turma;

    session_start();
    // var_dump( $_SESSION['id_professor']);
    // var_dump( $_SESSION['nome_professor']);
    $idProfessor = $_SESSION['id_professor'];

    $turma = new Turma();

    $turmas = $turma->listTurmas($idProfessor);
    ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="../style/listTurmas.css">
</head>
<?php if (!empty($turmas)) { ?>
    <?php if ($turmas->num_rows > 0) { ?>

        <body>
            <header>
                <nav>
                    <ul class="nav-list">
                        <li style="color: white;">Professor(a): <?php echo $_SESSION['nome_professor']; ?></li>
                        <li><a href="telaProfessor.php">Home</a></li>
                        <li><a href="../logaut.php">Logout</a></li>

                        <form action="createTurma.php" method="post">
                            <input type="hidden" name="idProfessor" value="<?php echo $_SESSION['id_professor']; ?>">
                            <button type="submit" class="update"> Cadastrar turma</button>
                        </form>
                    </ul>
                </nav>
            </header>

            <div class="filter"></div>
            <table>
                <tr>
                    <th>Codigo da turma</th>
                    <th>Nome</th>
                    <th>Deletar</th>
                    <th>Detalhes</th>
                </tr>

                <?php while ($line = $turmas->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $line["idturmas"] ?></td>
                        <td><?php echo $line["nome"] ?></td>
                        <td>
                            <form action="../control/deleteTurma.php" method="post">
                                <input type="hidden" name="idTurma" value="<?php echo $line["idturmas"] ?>">
                                <button type="submit" class="deleteButton">Delete</button>
                            </form>
                        </td>
                        <td>
                            <form action="telaAtividades.php" method="post">
                                <input type="hidden" name="nomeTurma" value="<?php echo $line["nome"] ?>">
                                <input type="hidden" name="idTurma" value="<?php echo $line['idturmas'] ?>">
                                <button type="submit" class="updateButton">Visualizar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </body>
<?php }
} ?>

</html>