
<div class="box-content">
    <h2><i class="far fa-list-alt"></i> Empreendimentos</h2>
    <div class="busca">
        <h4> <i class="fa fa-search" ></i> Realizar uma busca</h4>
        <form method="post" >
            <input placeholder="Procure pelo nome do empreendimento" type="text" name="busca">
            <input type="submit" name="acao" value="Buscar!">
        </form>
    </div><!--busca-->
    <?php 

    if (isset($_GET['deletar'])) {
        //Deletar o produto
        $id = (int)$_GET['deletar'];
        $imagens = MySql::conectar()->prepare("SELECT `imagem` FROM `tb_admin.empreendimentos` WHERE id = $id" );
        $imagens->execute();
        $imagens = $imagens->fetch();       
        @unlink(BASE_DIR_PAINEL.'/uploads/'.$imagens['imagem']);
             
        MySql::conectar()->exec("DELETE FROM `tb_admin.empreendimentos` WHERE id = $id");
        Painel::alert('sucesso', 'O empreendimento foi deletado com sucesso!');
    }
        
    ?>  
    
    <div class="boxes">        
        <?php
            $query = "";
            if (isset($_POST['acao']) && $_POST['acao'] == 'Buscar!'){
                $nome = $_POST['busca'];
                $query = "WHERE (nome LIKE '%$nome%')";
            }
            if ($query == "") {
                $query2 = "";
            }else{
                $query2 = "";
            }
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.empreendimentos` $query $query2");
            $sql->execute();
            $produtos = $sql->fetchAll();
            if ($query != '') {
                echo '<div style="width:100%;" class="busca-result"><p>Foram encontrados <b>'.count($produtos).'</b> resultados</p></div>';
            }
            foreach ($produtos as $key => $value) {     
            
        ?>
        <div class="box-single-wraper" >
            <div style="border: 1px solid #ccc;padding:8px 15px;height:100%" >
            <div style="width:100%;float: left;" class="box-imgs"> 
            <img class="img-square" src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['imagem']; ?>">
            </div>
            <div style="width:70%;float: left;border:0;" class="box-single">               
                <div class="body-box">
                    <p><b><?php echo $value['nome']; ?></b></p>
                    <p><?php echo ucfirst($value['tipo']); ?> </p>
                    <div class="group-btn">
                        <a class="btn delete"  href="<?php echo INCLUDE_PATH_PAINEL ?>listar-empreendimentos?deletar=<?php echo $value['id'] ?>"><i class="fa fa-times"></i> Excluir</a>
                        
                    </div><!--group-btn-->
                </div><!--body-box-->

            </div><!--box-single-->
            <div class="clear"></div>
        </div>
        </div><!--box-single-wraper-->
          
            <?php }?>

        

    </div><!--boxes-->

</div><!--box-content-->