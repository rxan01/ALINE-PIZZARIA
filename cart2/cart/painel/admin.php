<?php


ob_start();
require('../sheep_core/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br" >
<head >
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Maykon Silveira</title>
        <link rel="stylesheet" href="assets/css/app.min.css">
        <script src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
    crossorigin="anonymous" defer></script>
        <!-- <script src="js/mostrar.js" defer></script> -->
        <link rel="stylesheet" href="assets/css/style.css">
        
</head>
<body>


<div align="center" style="padding:20px; margin-top:120px;" >
 
        <div class="col-md-10"> 
      <section class="section" >


            <!-- inicio topo menu -->
            <?php
            
            require_once('topo.php');

            ?>
      

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
                            <th>CPF</th>
                            <th>WhatsApp</th>
                            <th>Mais</th>
                           
                            <th>Enviar pedido</th>
                           
                          </tr>
                        </thead>
                        <tbody class="tabela">
                            
                          
                          <tr>
                            <td>7</td>
                            <td><?= date('d/m/Y') ?></td>
                            <td>teste</td>
                            
                            <td>444444444</td>
                            <td>R$ 77</td>
                                                   
                            <td><a href="" class="btn btn-icon btn-primary">ver mais</a></td>
                            <td>
                                <form action="" method="post">
                                 <input type="hidden" name="shepp-firewall" value="">
                                 <input type="hidden" name="idDelete" value="">
                                 <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i></button>
                                 </form>
                            </td>
                          </tr>
                         

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
      <!-- fim TABELA  MAYKONSILVEIRA.COM.BR MAYKON SILVEIRA -->
      </section>
      </div>
        
       
    </div>

  <script src="assets/js/custom.js"></script>

 
  

</body>
</html>

<?php
ob_end_flush();
?>