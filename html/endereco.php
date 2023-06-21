<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formulario.css">
    <script src="https://kit.fontawesome.com/20495baa67.js" crossorigin="anonymous"></script>
    <title>Endereço</title>
</head>

<body>
    <a href="../html/carrinho.php"><img src="img/logositeoff.png" alt="Logo da empresa" class="logo" /></a>
    <!-- Formulario -->

    <form class="form" action="" method="post">
        <h2 class="h2ender">Deseja cadastrar outro endereço?</h2>

        <div class="container-cad">

            <!-- CEP -->
            <div>
                <label>CEP</label>
                <br>
                <input type="text" id="cep" name="cep" maxlength="8" minlength="8" required />
            </div>

            <br>

            <!-- Cidade -->
            <div>
                <label>Cidade</label>
                <br>
                <input type="text" name="cidade" required>
            </div>

            <br>

            <!-- Bairro -->
            <div>
                <label>Bairro</label>
                <br>
                <input type="text" id="neighborhood" name="neighborhood" required data-input />
            </div>

            <br>

            <!-- Rua -->
            <div>
                <label>Rua</label>
                <br>
                <input type="text" name="rua" required>
            </div>

            <br>

            <!-- Numero da Residencia -->
            <div>
                <label>Numero da Residência</label>
                <br>
                <input type="text" name="numero" required>
            </div>

            <br>

            <!-- Complemento -->
            <div>
                <label>Complemento</label>
                <br>
                <input type="text" name="complemento">
            </div>

            <br>

            <!-- Região -->
            <div>
                <select class="form-select shadow-none" id="region" name="region" required data-input>
                    <option selected>Estado</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
            <br>

            <!-- Botões -->
            <button id="btn-enviar" class="btn" name="cadastrar">Enviar</button>

        </div>
        <br>

    </form>

</body>

</html>

<!-- PHP -->
<?php
session_start();

include("../html/conexao.php");


if (isset($_POST['cadastrar'])) {

    // insere as informaçoes digitadas nas variaveis
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['neighborhood'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $estado = $_POST['region'];
    $usuario = $_SESSION['idcli']; //pega o id do usuario dentro da seção

    // insere os dados de endereço dentro da tabela endercli
    $stmt = "INSERT INTO endercli (idcli,cep,cidade,bairro,rua,numero,complemento,estado) VALUES ('$usuario','$cep','$cidade','$bairro','$rua','$numero','$complemento','$estado')";

    $conect = mysqli_query($mysql, $stmt);
}

?>
