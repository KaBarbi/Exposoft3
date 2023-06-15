<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pedidos.css">
    <title>Histórico de Compras</title>
</head>

<body>

    <!-- titulo junto com a logo para voltar ao adm -->

    <div id="header">
        <div class="logo-container">
            <a href="../html/adm.php">
                <img src="img/logositeoff.png" alt="Logo da empresa" class="logo" />
            </a>
        </div>

        <h3 class="titulo-h">Histórico de Compras</h3>
    </div>

    <?php
    require("conexao.php");

    // Consulta SQL para selecionar todos os pedidos do cliente com informações adicionais
    $sql = "SELECT ped.idpedido, ped.idprod, cadprod.prodnome, ped.qtd, ped.totalped, ped.data_pedido, endercli.cidade, endercli.rua, endercli.numero, endercli.complemento, cadcli.user
        FROM pedidos ped
        INNER JOIN cadprod ON ped.idprod = cadprod.idprod
        INNER JOIN cadcli ON ped.idcli = cadcli.idcli
        INNER JOIN endercli ON ped.idender = endercli.idender";


    $qr = $mysql->query($sql) or die($mysql->error);

    // Verifica se existem registros retornados
    if ($qr->num_rows > 0) {
        // Exibe a tabela com as colunas desejadas 
        echo "<table>";
        echo "<tr>";
        echo "<th>ID Pedido</th>";
        echo "<th>Cliente</th>";
        echo "<th>Cidade</th>";
        echo "<th>Rua</th>";
        echo "<th>Número</th>";
        echo "<th>Complemento</th>";
        echo "<th>Data do Pedido</th>";
        echo "</tr>";

        while ($row = $qr->fetch_assoc()) {
            echo "<tr class='pedido-row' data-endereco-prodnome='" . $row["prodnome"] . "' data-endereco-qtd='" . $row["qtd"] . "' data-endereco-totalped='" . $row["totalped"] . "'>";
            echo "<td>" . $row["idpedido"] . "</td>";
            echo "<td>" . $row["user"] . "</td>";
            echo "<td>" . $row["cidade"] . "</td>";
            echo "<td>" . $row["rua"] . "</td>";
            echo "<td>" . $row["numero"] . "</td>";
            echo "<td>" . $row["complemento"] . "</td>";
            echo "<td>" . $row["data_pedido"] . "</td>";
            echo "</tr>";
        }


        echo "</table>";
        echo "</div>";
    } else {
        // caso nao tenha nenhum poedido aparece a mensagem abaixo
        echo "Nenhum pedido encontrado.";
    }

    $mysql->close();
    ?>
    <!-- infomarcoes ao clicar no pedido -->
    <div id="endereco-detalhes" class="endereco"></div>

    <script>
        const pedidoRows = document.querySelectorAll('.pedido-row');

        // abre a parte que exibe as informaç~oes de prodnome, qtd e totalped
        pedidoRows.forEach(row => {
            row.addEventListener('click', () => {
                const prodnome = row.dataset.enderecoProdnome;
                const qtd = row.dataset.enderecoQtd;
                const totalped = row.dataset.enderecoTotalped;

                // mostra antes daas variaveis as palavras "Produto:", "Quantidade:" e "Total:"
                const enderecoDetalhes = document.getElementById('endereco-detalhes');
                enderecoDetalhes.innerHTML = `
                    <p><strong>Produto:</strong> ${prodnome}</p>
                    <p><strong>Quantidade:</strong> ${qtd}</p>
                    <p><strong>Total:</strong> R$${totalped}</p>
                `;
                // deixa fixo na tela as informaçoes que aparecem ao clicar no pedido
                enderecoDetalhes.style.display = 'block';
            });
        });
    </script>

</body>

</html>