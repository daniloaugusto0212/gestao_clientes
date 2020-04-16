<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Editando Produto: 10</h2>
    <div class="card-title"><i class="far fa-image"></i> Imagens do produto:</div>
    <div class="boxes">
        <?php
        for ($i=1; $i < 4; $i++) { 
            
        ?>
        <div class="box-single-wraper">
            <div style="border: 1px solid #ccc;padding:8px 15px;" >
                <div style="width:100%;float: left;" class="box-imgs">
                    <img class="img-square" src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $i;?>.jpg" alt="">
                </div><!--box-imgs-->
                <div class="clear"></div>
                <div style="text-align:center;" class="group-btn">                       
                    <a class="btn delete"  href="<?php echo INCLUDE_PATH_PAINEL ?>visualizar-produto?deletarImagem=10"><i class="fa fa-times"></i> Excluir</a>
                </div><!--group-btn-->                
                
            </div>
        </div><!--box-single-wraper-->
        <?php }?>
    </div><!--boxes-->
    <div class="card-title"><i class="fas fa-info-circle"></i> Informações do produto:</div>
    <form method="post" enctype="multipart/form-data">
 
 <div class="form-group">
     <label>Nome do Produto:</label>
     <input type="text" name="nome">
 </div><!--form-group-->

 <div class="form-group">
     <label>Descrição do Produto:</label>
     <textarea name="descricao" ></textarea>
 </div><!--form-group-->

 <div class="form-group">
     <label>Largura do Produto:</label>
     <input type="number" name="largura" min="0" max="900" value="0">
 </div><!--form-group-->
 
 <div class="form-group">
     <label>Altura do Produto:</label>
     <input type="number" name="altura" min="0" max="900" value="0">
 </div><!--form-group-->
 
 <div class="form-group">
     <label>Comprimento do Produto:</label>
     <input type="number" name="comprimento" min="0" max="900" value="0">
 </div><!--form-group-->

 <div class="form-group">
     <label>Peso do Produto:</label>
     <input type="number" name="peso" min="0" max="50000" value="0">
 </div><!--form-group-->

 <div class="form-group">
     <label>Quantidade Atual do Produto:</label>
     <input type="number" name="quantidade" min="0" max="900" value="0">
 </div><!--form-group-->
 
 <div class="form-group">
     <label>Selecione a Imagens:</label>
     <input multiple type="file" name="imagem[]">
 </div><!--form-group-->
 <input type="submit" name="acao" value="Atualizar Produto!">
</form>
</div><!--box-content-->
