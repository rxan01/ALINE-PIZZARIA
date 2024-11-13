<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
    crossorigin="anonymous" defer></script>
    <script src="assets/js/main.js" defer></script>
    <title>Aline's Pizzaria</title>
</head>
<body>

    <div class="header">
        <p class="logo">Loja</p>
        <div class="cart">
            <i class="fa fa-shopping-cart"></i><p id="cart-count">0</p>
        </div>
    </div>

    <div class="container">
        <div class="linha-produtos">
            <!-- Produto 1 -->
            <form action="filtros/criar.php" method="post">
                <div class="corpoProduto">
                    <div class="imgProduto">
                        <img src="assets/img/pizza11.jpg" alt="Pizza 1" class="produtoMiniatura" />
                    </div>
                    <div class="titulo">
                        <p>Curso PHP</p>
                        <h2>R$ 497</h2>
                        <input type="hidden" name="id_produto" value="1">
                        <input type="hidden" name="valor" value="497">
                        <button type="submit" class="button" name="addCarrinho">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </form>

            <!-- Produto 2 -->
            <form action="filtros/criar.php" method="post">
                <div class="corpoProduto">
                    <div class="imgProduto">
                        <img src="assets/img/pizza22.jpg" alt="Pizza 2" class="produtoMiniatura" />
                    </div>
                    <div class="titulo">
                        <p>Curso PHP Avançado</p>
                        <h2>R$ 597</h2>
                        <input type="hidden" name="id_produto" value="2">
                        <input type="hidden" name="valor" value="597">
                        <button type="submit" class="button" name="addCarrinho">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </form>

            <!-- Produto 3 -->
            <form action="filtros/criar.php" method="post">
                <div class="corpoProduto">
                    <div class="imgProduto">
                        <img src="assets/img/pizza33.webp" alt="Pizza 3" class="produtoMiniatura" />
                    </div>
                    <div class="titulo">
                        <p>Curso Laravel</p>
                        <h2>R$ 697</h2>
                        <input type="hidden" name="id_produto" value="3">
                        <input type="hidden" name="valor" value="697">
                        <button type="submit" class="button" name="addCarrinho">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </form>

            <!-- Produto 4 -->
            <form action="filtros/criar.php" method="post">
                <div class="corpoProduto">
                    <div class="imgProduto">
                        <img src="assets/img/pizza44.jpg" alt="Pizza 4" class="produtoMiniatura" />
                    </div>
                    <div class="titulo">
                        <p>Curso JavaScript</p>
                        <h2>R$ 597</h2>
                        <input type="hidden" name="id_produto" value="4">
                        <input type="hidden" name="valor" value="597">
                        <button type="submit" class="button" name="addCarrinho">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="barraLateral">
            <div class="topoCarrinho">
                <p>Meu Carrinho</p>
            </div>
            <div id="carrinho-itens">
            </div>
            <div class="item-carrinho-vazio" id="carrinho-vazio">Seu carrinho está vazio!</div>
            <div class="rodape">
                <h3>Total</h3>
                <h2 id="total-preco">R$ 0</h2>
            </div>
            <button id="finalizar-compra" class="button" onclick="finalizarCompra()" style="display:none;">Finalizar Compra</button>
        </div>
    </div>

</body>
</html>
