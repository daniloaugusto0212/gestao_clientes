
<div class="box-content">
    <h2><i class="far fa-list-alt"></i> Produtos Cadastrados</h2>
    <div class="busca">
        <h4> <i class="fa fa-search" ></i> Realizar uma busca</h4>
        <form method="post" >
            <input placeholder="Procure pelo nome do produto" type="text" name="busca">
            <input type="submit" name="acao" value="Buscar">
        </form>
    </div><!--busca-->
    
    <div class="boxes">        
   
        <div class="box-single-wraper">
            <div style="border: 1px solid #ccc;" >
            <div style="width:30%;float: left;" class="box-imgs">
                <img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/5e98648da8fc4.png" alt="">
            </div>
            <div style="width:70%;float: left;border:0;" class="box-single">               
                <div class="body-box">
                    <p><b><i class="fa fa-pen" ></i> Nome do produto:</b> Camiseta </p>
                    <p><b><i class="fa fa-pen" ></i> Largura:</b> 10 </p>
                    <p><b><i class="fa fa-pen" ></i> Altura:</b> 20 </p>
                    <p><b><i class="fa fa-pen" ></i> Comprimento:</b> 30 </p>
                    <div style="padding:8px 0;;border-bottom:1px solid #ccc;" class="group-btn">
                        <form style="margin:0;">
                            <label for="">Quantidade atual:</label>
                            <input type="number" name="quantidade" min="0" max="900"  value="10">
                            <input style="background:#0091ea;" type="submit" name="atualizar" value="Atualizar!">

                        </form>
                    </div><!--group-btn-->
                    
                    <div class="group-btn">
                        <a class="btn delete" item_id="0"  href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fa fa-times"></i> Excluir</a>
                        <a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-cliente?id=0"><i class="fa fa-pen" ></i> Editar</a>
                       
                    </div><!--group-btn-->
                </div><!--body-box-->

            </div><!--box-single-->
            <div class="clear"></div>
        </div>
        </div><!--box-single-wraper-->
      

        

    </div><!--boxes-->

</div><!--box-content-->