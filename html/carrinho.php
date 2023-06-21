<form action="" method="post">
    <?php
    session_start();

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }
    $total = 0;

    // Verificar se foi enviada uma ação
    if (isset($_GET['acao'])) {

        // Adicionar ao carrinho
        if ($_GET['acao'] == 'add') {
            $id = intval($_GET['idprod']);
            if (!isset($_SESSION['carrinho'][$id])) {
                $_SESSION['carrinho'][$id] = 1;
            } else {
                $_SESSION['carrinho'][$id] += 1;
            }
            // Redirecionar para evitar repetição da ação ao recarregar a página
            header("Location: carrinho.php");
            exit();
        }

        // Remover do carrinho
        if ($_GET['acao'] == 'del') {
            $id = intval($_GET['idprod']);
            if (isset($_SESSION['carrinho'][$id])) {
                $_SESSION['carrinho'][$id] -= 1;
                if ($_SESSION['carrinho'][$id] <= 0) {
                    unset($_SESSION['carrinho'][$id]);
                }
            }
            // Redirecionar para evitar repetição da ação ao recarregar a página
            header("Location: carrinho.php");
            exit();
        }
    }

    // Verificar se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Atualizar a quantidade do produto
        if (isset($_POST['acao']) && $_POST['acao'] === 'add') {
            $idprod = intval($_POST['idprod']);
            $qtd = intval($_POST['qtd']);
            $qtd += 1;
            $_SESSION['carrinho'][$idprod] = $qtd;
            // Redirecionar para evitar repetição da ação ao recarregar a página
            header("Location: carrinho.php");
            exit();
        }
        // Atualizar a quantidade de produtos
        if (isset($_POST['acao']) && $_POST['acao'] === 'up') {
            if (is_array($_POST['prod'])) {
                foreach ($_POST['prod'] as $idprod => $qtd) {
                    $id = intval($idprod);
                    $qtd = intval($qtd);
                    if (!empty($qtd) || $qtd <> 0) {
                        $_SESSION['carrinho'][$id] = $qtd;
                    } else {
                        unset($_SESSION['carrinho'][$idprod]);
                    }
                }
            }
        }
    }

    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/cart.css">
        <link rel="stylesheet" href="../css/ender.css">
        <script src="https://kit.fontawesome.com/20495baa67.js" crossorigin="anonymous"></script>
        <title>Carrinho de Compras</title>
    </head>

    <body>
        <form action="carrinho.php" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>SubTotal</th>
                        <th>Remover</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include "conexao.php";

                    // se o carrinho esta vazio, exibe uma mensagem com a infomação abaixo
                    if (count($_SESSION['carrinho']) == 0) {
                        echo '<tr><td colspan="5">Não há produto no carrinho </td></tr>';
                    } else {
                        // caso tenha produto no carrinho
                        foreach ($_SESSION['carrinho'] as $idprod => $qtd) {
                            // pega tudo da tabela cadpord selecinando pelo id do cliente
                            $sql = "SELECT * FROM cadprod WHERE idprod = '$idprod'";
                            $qr = $mysql->query($sql) or die($mysql->error);
                            $ln = mysqli_fetch_assoc($qr);

                            if (!$ln) {
                                // se nao achar a linha do produto expecifico, exibe a mensagem abaixo
                                echo '<tr><td colspan="5">Produto não encontrado</td></tr>';
                                continue;
                            }

                            // mostra o nome, preço, subtotal e total
                            $nome = $ln['prodnome'];
                            $preco = 'R$ ' . number_format($ln['preco'], 2, ',', '.');
                            $sub = 'R$ ' . number_format($ln['preco'] * $qtd, 2, ',', '.');
                            $total += $ln['preco'] * $qtd;

                            echo '<tr>
                    <td>' . $nome . '</td>
                    <td>
                        <form action="" method="post">
                     
                            <input type="hidden" name="idprod" value="' . $idprod . '">
                            <input type="hidden" name="qtd" value="' . $qtd . '">
                            

                            <button class="btn-qtd" type="submit" name="acao" value="add">+</button>
                            ' . $qtd . '
                        </form>
                    </td>
                    <td>' . $preco . '</td>
                    <td>' . $sub . '</td>

                    <td><a class="remo-prod-btn" href="?acao=del&idprod=' . $idprod . '"><i class="fa-solid fa-xmark"></i></a></td>
                </tr>';
                        }
                    }
                    ?>

                </tbody>

                <tfoot>
                    <tr>
                        <!-- exibe o total da compra -->
                        <td colspan="4">Total:</td>
                        <td><?php echo 'R$ ' . number_format($total, 2, ',', '.') ?></td>
                    </tr>
                </tfoot>

            </table>

            <!-- Endereços aqui -->
            <div class="cont-ender">
                <!-- titulo do endereco -->
                <h4>Selecione o endereço de entrega:</h4>
                <?php
                require("conexao.php");

                // remover o endereço
                if (isset($_GET['remover'])) {
                    $enderecoIdRemover = $_GET['remover'];

                    // Atualizar a coluna "visivel" para 0 (remover o endereço)
                    $sqlAtualizarVisibilidade = "UPDATE endercli SET visivel = 0 WHERE idender = '$enderecoIdRemover'";
                    $resultadoAtualizarVisibilidade = mysqli_query($mysql, $sqlAtualizarVisibilidade);

                    if ($resultadoAtualizarVisibilidade) {
                        header("Location: carrinho.php"); // Redirecionar de volta para a página de carrinho após a remoção do endereço
                        exit();
                    } else {
                        echo "<script>alert('Erro ao remover o endereço.');</script>";
                    }
                }

                // Verificar se o cliente está logado
                if (isset($_SESSION['idcli'])) {
                    $idCliente = $_SESSION['idcli'];

                    // pega tudo da tabela endercli e seleciona os enderecos visiveis do respectivo cliente logado
                    $sql = "SELECT * FROM endercli WHERE idcli = '$idCliente' AND visivel = 1";
                    $qr = $mysql->query($sql) or die($mysql->error);

                    // exibe todos enderecos visiveis cadastrados do usuario atual
                    while ($ln = mysqli_fetch_assoc($qr)) {
                        $enderecoId = $ln['idender'];
                        $invisivel = isset($_SESSION['enderecos_invisiveis']) && in_array($enderecoId, $_SESSION['enderecos_invisiveis']);

                        echo '<div class="enderecos' . ($invisivel ? ' hidden' : '') . '">';
                        echo '<div class="card-ender">';
                        echo '<input type="radio" name="endereco" value="' . $enderecoId . '" >';
                        echo '<p class="ender-p">Cidade: ' . $ln['cidade'] . '</p>';
                        echo '<p class="ender-p">Rua: ' . $ln['rua'] . '</p>';
                        echo '<p class="ender-p">Número:  ' . $ln['numero'] . '</p>';
                        echo '<p class="ender-p">Complemento: ' . $ln['complemento'] . '</p>';
                        // btn para remover endereço, no caso deixando ele invisivel ( visivel 0 na tabela) assim nao aparecendo mais para o usuario
                        echo '<a class="remover-btn" href="../html/carrinho.php?remover=' . $enderecoId . '">Remover</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                }

                ?>
            </div>
        </form>


        <div class="botoes">
            <!-- btn de finalizar compra que redireciona para a pagina compra -->
            <a href="compra.php"><input type="submit" value="Finalizar Compra" name="fimcomp"></a> <br>
            <!-- btn para a home para adicionar novos produtos -->
            <a href="index.php">Continuar Comprando</a>
            <!-- btn para adicionar novo endereco -->
            <a href="endereco.php">Adicionar outro endereço</a>

        </div>
</form>
</body>

</html>
<?php
// Verifica se o formulário de finalizar compra foi enviado. Se sim, são realizadas algumas validações e, se tudo estiver correto, os produtos são inseridos na tabela "pedidos" do banco de dados.
include("conexao.php");
if (isset($_POST['fimcomp'])) {
    $usuario = $_SESSION['idcli'];
    $enderecoid2 = $_POST['endereco'];
    if (empty($enderecoid2)) {
        // Caso não selecionar um endereço, ao clicar em finalizar compra, exibe um alerta para selecionar um.
        echo "<script>alert('Selecione um endereço de entrega');</script>";
    } elseif (count($_SESSION['carrinho']) == 0) {
        // Caso finalizar a compra sem itens no carrinho, exibe um alerta sobre carrinho vazio.
        echo "<script>alert('Seu carrinho está vazio');</script>";
    } else {
        foreach ($_SESSION['carrinho'] as $idprod => $qtd) {
            // envia o pedidos para o banco de dados
            $stmt = mysqli_query($mysql, "INSERT INTO pedidos (idprod,idcli,idender,qtd,totalped) VALUES ('$idprod','$usuario','$enderecoid2','$qtd','$total')");
        }
        unset($_SESSION['carrinho']);
        echo "<script>window.location.href = 'compra.php';</script>";
        exit();
    }
}
?>