<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <a href="../html/adm.php"><img src="img/logositeoff.png" alt="Logo da empresa" class="logo" /></a>

    <!-- <h3>Produtos Removidos</h3> -->

    <div class="container">
        <?php
        require("conexao.php");

        if (isset($_GET['restaurar'])) {
            $idProdutoRestaurar = $_GET['restaurar'];

            // Atualizar a coluna "visivel" para 1
            $sqlAtualizarVisibilidade = "UPDATE cadprod SET visivel = 1 WHERE idprod = '$idProdutoRestaurar'";
            $resultadoAtualizarVisibilidade = mysqli_query($mysql, $sqlAtualizarVisibilidade);

            if ($resultadoAtualizarVisibilidade) {
                header("Location: ../html/remoprod.php"); // Redirecionar para a página de administração após a restauração da visibilidade do produto
                exit();
            } else { //mensagem para caso nao consiga fazer a restaruralção do produto
                echo "<script>alert('Erro ao restaurar a visibilidade do produto.');</script>";
            }
        }

        // selecioan todos os itens da tabela cadprod porem apenas os que tem a coluna visivel com 0 nela
        $sql = "SELECT * FROM cadprod WHERE visivel = 0";
        $qr = $mysql->query($sql) or die($mysql->error);

        // exibe todos os produtos com visisbilade 0 na tabela, ou seja os produtos removidos
                if (mysqli_num_rows($qr) > 0) {
            while ($ln = mysqli_fetch_assoc($qr)) {
                echo '<div class="product-card">';
                echo '<div class="product">';
                echo '<div class="image">';
                echo '<img class="product-image" src="' . $ln['img'] . '" alt="" />';
                echo '</div>';
                echo '<div class="title">';
                echo $ln['prodnome'];
                echo '</div>';
                echo '<div class="detail">';
                $preco = floatval($ln['preco']);
                echo '<p>Preço: <span>R$ ' . number_format($preco, 2, ',', '.') . '</span></p>';
                echo '<a href="../html/remoprod.php?restaurar=' . $ln['idprod'] . '">Restaurar</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            // caso nao tenha nenhum produto removido, ele mostra a mensagem abaixo na tela
            echo "Não existem produtos removidos atualmente.";
        }
        ?>


    </div>
</body>

</html>