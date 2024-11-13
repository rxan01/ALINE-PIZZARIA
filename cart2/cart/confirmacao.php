

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #28a745;
        }

        .pedido-details, .itens {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .itens ul {
            list-style-type: none;
            padding: 0;
        }

        .itens li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .itens li:last-child {
            border-bottom: none;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Compra Finalizada com Sucesso!</h1>

    <div class="pedido-details">
        <p><strong>Pedido Nº:</strong> <?php echo $pedido['id']; ?></p>
        <p><strong>Status:</strong> <?php echo $pedido['status']; ?></p>
        <p><strong>Total:</strong> R$ <?php echo number_format($pedido['total'], 2, ',', '.'); ?></p>
    </div>

    <div class="itens">
        <h2>Itens do Pedido</h2>
        <ul>
            <?php foreach ($itens as $item): ?>
                <li>
                    <strong><?php echo $item['produto_nome']; ?></strong> |
                    Quantidade: <?php echo $item['quantidade']; ?> |
                    Preço: R$ <?php echo number_format($item['valor'], 2, ',', '.'); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <a href="index.php">Voltar à loja</a>
</body>
</html>
