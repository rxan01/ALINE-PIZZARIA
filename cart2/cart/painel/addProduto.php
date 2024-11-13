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
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="js/script.js" defer></script>
    
</head>
<body>


<!-- Main Content -->
<div align="center" style="padding:20px; margin-top:120px;" >
 
        <div class="col-md-10"> 
      <section class="section" >


            <!-- inicio topo menu -->
            <?php
            
            require_once('topo.php');

            ?>
      
            <!-- fim topo menu -->


           <br>
         <!-- inicio formulario  topo menu -->


         <div class="section-body" >
          <div class="row" >
            <div class="col-md-12">
              <div class="card">
                  
                    
                <div class="card-header">
                  <h4>Produtos</h4><br>
                 
                </div>
                <div class="card-body">
         
                  <div class="form-group row mb-4">
                   
                    <div class="col-md-12">
                      <input type="file" class="form-control"  id="media" name="media" accept="image/png, image/jpeg, video/mp4, video/avi, video/mov" >
                    </div>
                    
                  </div>

                  <div class="form-group row mb-4">
                   
                    <div class="col-md-12">
                      <input type="text" id="nome" class="form-control" name="nome" placeholder="Título do Produto" >
                    </div>
                    
                  </div>

                  <div class="form-group row mb-4">
                   
                   <div class="col-md-12">
                     <input type="text" class="form-control" name="valor" placeholder="Valor" id="valor">
                   </div>
                   
                 </div>

                  
                  <div class="form-group row mb-4">
                   
                    <div class="col-md-12">
                        <button class="btn btn-lg btn-primary"  style="width:100%;" name="criarProduto" id="salvar">Salvar</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- fim formulario  topo menu -->
      </section>
      </div>
        
       
    </div>

  <script src="assets/js/custom.js"></script>

 
  

</body>
</html>

<?php
ob_end_flush();
?>