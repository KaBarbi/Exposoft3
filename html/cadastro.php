<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formulario.css">
    <script src="https://kit.fontawesome.com/20495baa67.js" crossorigin="anonymous"></script>
    <title>Cadastro</title>
</head>

<body>
    <!-- logo do site para voltar para a pagina index -->
    <a href="../html/index.php"><img src="img/logositeoff.png" alt="Logo da empresa" class="logo" /></a>
    <!-- Formulario -->
    <form class="form" method="post">
        <div class="container-cad">
            <!-- Nome -->
            <div>
                <br>
                <label>Nome</label>
                <br>
                <input type="text" name="nome" required>
            </div>
            <br>
            <!-- Usuario -->
            <div>
                <label>Usuario</label>
                <br>
                <input type="text" name="user" required>
            </div>
            <br>
            <!-- Celular -->
            <div>
                <label>Celular</label>
                <br>
                <input type="text" maxlength="14" name="cel" required>
            </div>
            <br>
            <!-- E-mail -->
            <div>
                <label>E-mail</label>
                <br>
                <input type="email" name="email" required>
            </div>
            <br>
            <!-- CPF -->
            <div>
                <label for="cpf">CPF</label>
                <br>
                <input type="text" maxlength="11" id="cpf-input" name="cpf" required>
            </div>
            <br>

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
                <input type="text" id="city" name="city" required data-input />
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
                <input type="text" id="address" name="address" required data-input />
            </div>

            <br>

            <!-- Numero da Residencia -->
            <div>
                <label>Numero da Residencia</label>
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

            <!-- Senha e Confirmar Senha -->
            <div>
                <input type="password" name="senha" required onchange="confereSenha();" placeholder="Senha">
                <input type="password" name="confirma" required onchange="confereSenha();" placeholder="Confirmar Senha">
            </div>
            <br>

            <!-- Botões -->
            <button id="btn-enviar" class="btn" name="cadastrar" onclick="if (!validateCPF(document.getElementById('cpf-input').value)) return false;">Cadastrar</button>
        </div>
        <br>
        <!-- caso seja cadastrado link para a pagina de logar -->
        <p>Já é cadastrado?</p>
        <a href="../html/login.php">Logar</a> <br>

    </form>

</body>
<!-- Script -->
<script src="../js/cadastro.js"></script>

</html>

<!-- PHP -->
<?php
// puxar conexao
include("conexao.php");

if (isset($_POST['cadastrar'])) {

    //  pega as informaçoes digitadas na tabela e coloca dentro da variavel
    $nome = $_POST['nome'];
    $user = $_POST['user'];
    $cel = $_POST['cel'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];
    $senha = $_POST['senha'];
    $cidade = $_POST['city'];
    $bairro = $_POST['neighborhood'];
    $rua = $_POST['address'];
    $estado = $_POST['region'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];

    // verifica se ja existe cadastro do usuario, emial, cpf e cel dentro da tabela cadcli
    $sql = "SELECT * FROM cadcli WHERE user = '$user' OR cel = '$cel' OR email = '$email' OR cpf = '$cpf'";

    $result = mysqli_query($mysql, $sql);

    // verifica se ja existe cadastro do usuario, emial, cpf e cel dentro da tabela adm
    $sqladm = "SELECT * FROM adm WHERE user = '$user' OR cel = '$cel' OR email = '$email' OR cpf = '$cpf'";

    $result2 = mysqli_query($mysql, $sqladm);


    // caso exista um dos intem ja cadastrados, retorna uma mensagem de "cadastro exixtente"
    if (mysqli_num_rows($result2) > 0) {
        echo "<script>alert('Cadastro Existente.');</script>";
    } else {

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Cadastro Existentes.');</script>";
        } else {

            // insere os dadso digitados dentro da tabela cadcli, caso tenha passado pelas especificaçoes
            $stmt = "INSERT INTO cadcli (nome,user,cel,email,cpf,senha) VALUES ('$nome','$user','$cel','$email','$cpf','$senha')";

            $conect = mysqli_query($mysql, $stmt);

            $resultado = mysqli_query($mysql, "SELECT MAX(idcli) FROM cadcli");

            // Transformando o resultado em um array
            $linha = mysqli_fetch_array($resultado);

            // Acessando o valor do ID mais recente
            $ultimo_id = $linha[0];
            // insere os dados digitados de endereço para a tabela endercli
            $smt = "INSERT INTO endercli (idcli,cep,cidade,bairro,rua,estado,numero,complemento) VALUES ('$ultimo_id','$cep','$cidade','$bairro','$rua','$estado','$numero','$complemento')";

            $conect2 = mysqli_query($mysql, $smt);
        }
    }
}
?>