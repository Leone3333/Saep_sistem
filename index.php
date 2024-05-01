<?php
session_start();

if (isset($_GET['erro'])) {
    $mensagem_erro = urldecode($_GET['erro']);
    echo "<p style='color: red;'>$mensagem_erro</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saep pratico</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <!-- Se você quiser mostrar o alerta aqui, pode usar a seguinte div -->
<div id="successAlert" style="display: none;"></div>
    <header>
        <!-- <nav>
            <ul class="nav-list">
                <li><a href="telaProfessor.php">Home</a></li>
                <li><a href="listUser.php">List</a></li>
            </ul>
        </nav> -->
    </header>

    <form action="login.php" method="post">
        <div class="right">
            <div class="card-login">

            <h2>Bem vindo</h2>

            <div class="inputs">
                <label for="">Email</label>
                <input type="text" name="email" placeholder="Seu email:">
            </div>

            <div class="inputs">
                <label for="">Senha</label>
                <input type="text" name="senha" placeholder="Sua senha">
            </div>

            <button href="" class="btn-login">Submit</button>
        </div>
    </div>
</form>

</script>
</body>
</html>