<?php
ob_start();
require('../sheep_core/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Maykon Silveira</title>
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
        crossorigin="anonymous" defer></script>
    <script src="js/endereco.js" defer></script>
</head>
<body>

<div align="center" style="padding:20px; margin-top:120px;">
    <div class="col-md-10">
        <section class="section">
            <?php require_once('topo.php'); ?>
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ativos</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>  
                                            <th>Criado</th>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>Mais</th>
                                            <th>Enviar pedido</th>
                                            <th>Cancelar</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tabela">
                                        <tr>
                                            <td>7</td>
                                            <td><?= date('d/m/Y') ?></td>
                                            <td>teste</td>
                                            <td>R$ 77</td>
                                            <td id='endereco'>
                                                <button class="btn btn-icon btn-primary ver-mais" data-endereco="Rua Exemplo, 123 - Bairro: Centro, CEP: 12345-678 Complemento">ver mais</button>
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                    <input type="hidden" name="shepp-firewall" value="">
                                                    <input type="hidden" name="idDelete" value="">
                                                    <button type="button" class="btn btn-secondary">Enviar Pedido</button>
                                                </form>
                                            </td>
                                            <td><button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Modal para exibir endereço -->
<div id="modalEndereco" style="display:none; z-index: 9999;">
    <div style="background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; z-index: 10000;">
        <div style="background-color: white; padding: 20px; border-radius: 8px; width: 300px; text-align: center; z-index: 10001;">
            <h4>Endereço</h4>
            <p id="enderecoDetalhes"></p>
            <button onclick="fecharModal()" style="margin-top: 10px;">Fechar</button>
        </div>
    </div>
</div>



<script src="assets/js/custom.js"></script>
</body>
</html>

<?php
ob_end_flush();
?>
