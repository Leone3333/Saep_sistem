<?php session_start(); 

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
    <!-- Se você quiser mostrar o alerta aqui, pode usar a seguinte div -->
    <div id="successAlert" style="display: none;"></div>
    <header>
        <nav>
            <ul class="nav-list">
                <li><a href="telaProfessor.php">Home</a></li>
                <li><a href="../logaut.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <form action="../control/createTurma.php" method="post">
        <div class="right">
            <div class="card-login">

                <h2>Nome da turma</h2>

                <div class="inputs">
                    <label for="">Nome</label>
                    <input type="text" name="nome" placeholder="Digite o nome da turma">
                </div>
                <input type="hidden" name="idProfessor" value="<?php echo $_SESSION['id_professor'] ?>">
                <button href="" class="btn-login">Submit</button>

            </div>
        </div>
    </form>

    </script>
</body>

</html>