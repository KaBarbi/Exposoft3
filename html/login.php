<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formulario.css">
    <script src="https://kit.fontawesome.com/20495baa67.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <a href="../html/index.php"><img src="img/logositeoff.png" alt="Logo da empresa" class="logo" /></a>
    <!-- Formulario -->
    <form class="form" method="post">

        <div class="container-cad">


            <!-- Usuario -->
            <div>
                <br>
                <label>Usuario</label>
                <br>
                <input type="text" maxlength="10" name="user" required>
            </div>

            <!-- Senha e Confirmar Senha -->
            <div>
                <label>Senha</label><br>
                <input type="password" name="senha" required placeholder="Senha">
            </div>
            <!-- Botões -->

            <div>

                <button id="btn-enviar" class="btn" name="login">Logar</button>

            </div>

        </div>

        <br>
        <p>Não é cadastrado?</p>
        <a href="../html/cadastro.php">Cadastrar-se</a>
    </form>

</body>

</html>

<!-- PHP -->
<?php
session_start();

include("../html/conexao.php");

if (isset($_POST['login'])) {

    $user = $_POST['user'];
    $senha = $_POST['senha'];

    //Para verificar se já é cadastrado
    $sql = "SELECT * FROM cadcli WHERE user = '$user' AND senha = '$senha'";

    $result = mysqli_query($mysql, $sql);

    $sqladm = "SELECT * FROM adm WHERE user = '$user' AND senha = '$senha'";

    $result2 = mysqli_query($mysql, $sqladm);

    if (mysqli_num_rows($result2) > 0) {
        while ($usuario = mysqli_fetch_array($result2)) {
            $_SESSION['idadm'] = $usuario['idadm'];
            $_SESSION['user'] = $usuario['user'];
            header("location: ../html/adm.php");
        }
    } else {

        if (mysqli_num_rows($result) > 0) {
            while ($usuario = mysqli_fetch_array($result)) {
                $_SESSION['idcli'] = $usuario['idcli'];
                $_SESSION['user'] = $usuario['user'];
                header("location: ../html/index.php");
            }
        } else {
            echo "<script>alert('Não cadastrado');</script>";
        }
    }
}


?>