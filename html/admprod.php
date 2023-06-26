<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link para os csss do cadastro de prod e dos cards de produto -->
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- verificação para o cadastro de produto em js -->
    <script src="../js/cadprod.js"></script>
    <title>Cadastro de Produtos</title>
</head>

<body>
    <!-- iamgem da logo para voltar a pagian de adm (ao clicar) -->
    <a href="../html/adm.php"><img src="img/logositeoff.png" alt="Logo da empresa" class="logo" /></a>
    <!-- Formulario com a parte para cadastrar produto-->
    <form class="form" method="post">
        <div class="container-cad">
            <!-- Nome do Produto -->
            <div>
                <label>Nome do Produto</label>
                <br>
                <input type="text" name="prodnome" id="prodnome" required>
            </div>

            <br>
            <!-- tipo do produto -->
            <div>
                <label>tipo do produto</label>
                <br>
                <select name="tipo">
                    <option value="skatecompleto">skatecompleto</option>
                    <option value="shape">shape</option>
                    <option value="lixa">lixa</option>
                    <option value="roda">roda</option>
                    <option value="rolamento">rolamento</option>
                    <option value="truck">truck</option>
                    <option value="ferramenta">ferramenta</option>
                </select>
            </div>

            <br>
            <!-- Preço -->
            <div>
                <label>Preço</label>
                <br>
                <input type="text" name="preco" required>
            </div>
            <br>
            <!-- Descrição -->
            <div>
                <label>Descricão</label>
                <br>
                <input class="desc" type="text" name="descricao" required>
            </div>
            <br>
            <!-- Imagem -->
            <div>
                <label>Imagem</label>
                <br>
                <input type="text" name="img" value="img/" required>
            </div>
            <br>
            <!-- Botões de enviar as informaçoes do produto adicionado -->
            <button id="btn-enviar" class="btn" name="cadastrar" onclick="validarFormulario()">Enviar</button>
        </div>

        <!-- formualrio que mostra os produtos do site -->
    </form>

    <!-- codigo em php para aparecer todos os produtos do site -->
    <div class="container">

        <?php
        // puxa conexao com o banco de dados
        // php para exibir os produtos cadastrados (todos)
        require("conexao.php");

        // função apra remover, produto no caso deixando invisivel, ao clicar em remover ele muda a coluna visivel do porduto de 1 para 0 assim nao deixando mais ele visivel
        if (isset($_GET['remover'])) {
            $idProdutoRemover = $_GET['remover'];

            // Atualizar a coluna "visivel" para 0
            $sqlAtualizarVisibilidade = "UPDATE cadprod SET visivel = 0 WHERE idprod = '$idProdutoRemover'";
            $resultadoAtualizarVisibilidade = mysqli_query($mysql, $sqlAtualizarVisibilidade);

            // Redirecionar para a página de administração após a atualização da visibilidade do produto
            if ($resultadoAtualizarVisibilidade) {
                header("Location: ../html/admprod.php");
                exit();
            } else {
                echo "<script>alert('Erro ao atualizar a visibilidade do produto.');</script>";
            }
        }

        // mostra todos os produtos que estao com 1 na coluna visivel no banco de dados ou seja mostrando apenas os produtos nao removidos 
        $sql = "SELECT * FROM cadprod WHERE visivel = 1";
        $qr = $mysql->query($sql) or die($mysql->error);

        // exibe os produtos cadastrados no banco com as especificaçoes de divs e classes configuradas 
        while ($ln = mysqli_fetch_assoc($qr)) {
            echo '<div class="product-card">';
            echo '<div class="product">';
            echo '<div class="image">';
            echo '<img class="product-image" src="' . $ln['img'] . '" alt="" />'; //exibi a imagem do produto
            echo '</div>';
            echo '<div class="title">';
            echo $ln['prodnome']; //exibe o nome do produto 
            echo '</div>';
            echo '<div class="detail">';
            $preco = floatval($ln['preco']);
            echo '<p>Preço: <span>R$ ' . number_format($preco, 2, ',', '.') . '</span></p>'; //exibe o preço do produto
            echo '<a href="../html/admprod.php?remover=' . $ln['idprod'] . '">Remover</a>'; //botao remover
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>



    </div>

</body>

</html>

<!-- PHP -->
<?php
// php de cadastrar produto novo no site
include("conexao.php");

// inseri no banco de dados as informações colocados no fomulario
if (isset($_POST['cadastrar'])) {


    //  pega as informaçoes digitadas na tabela e coloca dentro da variavel
    $prodnome = $_POST['prodnome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $img = $_POST['img'];

    //Para verificar se já existe o produto cadastrado com as infomações digitadas
    $sql = "SELECT * FROM cadprod WHERE prodnome = '$prodnome' OR img = '$img'";

    $result = mysqli_query($mysql, $sql);

    // Para se caso não existir a tag "<br>" no nome do produto não deixar cadastrar

    if (!strpos($prodnome, "<br>")) {
        echo "<script>alert('O nome do produto deve conter a tag <br>.');</script>";
    } else {
        // Para se caso existir o produto na tabela não deixar cadastrar novamente

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Produto Existentes.');</script>";
        } else {
            //Para inserir dentro das tabelas do localhost
            $stmt = "INSERT INTO cadprod (prodnome,tipo,preco,descricao,img) VALUES ('$prodnome','$tipo','$preco','$descricao','$img')";

            $conect = mysqli_query($mysql, $stmt);
        }
    }
}
?>