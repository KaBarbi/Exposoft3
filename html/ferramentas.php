<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Everyday Skt</title>
    <link rel="stylesheet" href="../css/style.css" />
    <script src="https://kit.fontawesome.com/20495baa67.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>

<header id="header">
    <!-- imagem para voltar a home com a logo do site -->
    <a href="../html/index.php"><img src="img/logositeoff.png" alt="Logo da empresa" class="logo" /></a>

    <!-- menu -->
    <nav id="nav">
        <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
            Menu
            <span id="hamburger"></span>
        </button>
        <ul id="menu" role="menu">
            <li><a class="a_menu" href="../html/index.php">Skates</a></li>
            <li><a class="a_menu" href="../html/shape.php">Shape</a></li>
            <li><a class="a_menu" href="../html/rodas.php">Rodas</a></li>
            <li><a class="a_menu" href="../html/trucks.php">Trucks</a></li>
            <li>
                <a class="a_menu" href="../html/ferramentas.php">Ferramentas</a>
            </li>
        </ul>

        <!-- php para o botao de cadastrar no menu e o carrinho -->
        <?php
        session_start();
        if (!isset($_SESSION['user'])) {

            // icone do btn de cadastro
            echo "<div class='nav-buttons'>";
            echo "<a class='iconlb' href='../html/login.php'><span class='material-icons' style='font-size: 37px'>account_circle</span></a>";

            echo "<div style='display: flex; flex-direction: column;'>";

            echo "";

            echo "</div>";
            // icone de btn de carrinho de compras, que redireciona ao carrinho
            echo "<a class='iconlb' href='../html/login.php'><span class='material-icons iconlb-icon' style='font-size: 37px'>shopping_bag</span></a>";
            echo "</div>";
        } else {

            if (isset($_SESSION['idadm'])) {
                // caso o cliente esteja logado e clicar no btn de cadastro ele sera redirecionado para a pagina de pedidos
                echo "<div class='nav-buttons'>";
                echo "<a class='iconlb' href='../html/adm.php'><span class='material-icons' style='font-size: 37px'>account_circle</span></a>";

                echo "<div style='display: flex; flex-direction: column;'>";

                // quando o usuario esta logado aparecera um btn sair abaixo do nome para encerrar a seçao da conta
                echo $_SESSION['user'];
                echo "<br>";
                echo "<a class='sair-btn' href='../html/logout.php'>Sair</a>";

                echo "</div>";

                echo "<a class='iconlb' href='../html/carrinho.php'><span class='material-icons iconlb-icon' style='font-size: 37px'>shopping_bag</span></a>";
                echo "</div>";
            } else {
                // caso o cliente esteja logado e clicar no btn de cadastro ele sera redirecionado para a pagina de pedidos
                echo "<div class='nav-buttons'>";
                echo "<a class='iconlb' href='../html/pedidoscli.php'><span class='material-icons' style='font-size: 37px'>account_circle</span></a>";

                echo "<div style='display: flex; flex-direction: column;'>";

                // quando o usuario esta logado aparecera um btn sair abaixo do nome para encerrar a seçao da conta
                echo $_SESSION['user'];
                echo "<br>";
                echo "<a class='sair-btn' href='../html/logout.php'>Sair</a>";

                echo "</div>";

                echo "<a class='iconlb' href='../html/carrinho.php'><span class='material-icons iconlb-icon' style='font-size: 37px'>shopping_bag</span></a>";
                echo "</div>";
            }
        }
        ?>

    </nav>
</header>
<script src="../js/script.js"></script>

<body>
    <!-- * titulo shapes/lixas -->
    <div class="titulo-paginas">
        <h1>Ferramentas & Parafusos!</h1>
    </div>
    <!--* card de produtos -->

    <div class="container">

        <?php
        require("conexao.php");
        // pega tudo de dentro da tabela cadprod e seleciona os item com o tipo: ferrmenta, e com visivel 1
        $sql = "SELECT * FROM cadprod WHERE tipo = 'ferramenta' AND visivel = 1";
        $qr = $mysql->query($sql) or die($mysql->error);

        // quando o usuario nao esta logado ainda
        if (!isset($_SESSION['user'])) {
            // exibe todos os produtos que passam pelas exigencias assima na tela
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
                // redireciona o usuario para o login ao clicar em comprar
                echo '<a href="../html/login.php">Comprar</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {

            // com o usuario logado exibe todos os produtos
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
                // quando clica em comprar redireciona para o carrinho
                echo '<a href="../html/carrinho.php?acao=add&idprod=' . $ln['idprod'] . '">Comprar</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
    </div>
</body>

<!-- footer -->
<footer>
    <div class="footer">
        <div class="container-footer">
            <div class="row">
                <div class="footer-col">
                    <h4>Equipe de Devs</h4>
                    <ul>
                        <li><a>Kaue Barbi</a></li>
                        <li><a>Miguel Arcanjo</a></li>
                        <li><a>Felipe Moya</a></li>
                        <li><a></a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Everyday Skateboard</h4>
                    <ul>
                        <li><a>Alcina Dantas Feijão</a></li>
                        <li><a>35° Exposoft</a></li>
                        <li><a>(11) 4224-0679</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Redes Socias</h4>
                    <!-- btns com links para as redes sociais -->
                    <div class="social-link">
                        <a><i class="fa-brands fa-facebook"></i></a>
                        <a><i class="fa-brands fa-instagram"></i></a>
                        <a><i class="fa-brands fa-twitter"></i></a>
                        <a><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <img class="img-footer" src="./img/logoalcina.jpg" alt="logo alcina">
                    <a href=""><img class="img-footer" src="./img/logoexpo.jpg" alt="logo expo"></a>
                    <!-- <img class="img-footer" src="./img/logoexpo.jpg" alt="logo expo"> -->
                </div>
            </div>
        </div>
    </div>
</footer>

</html>