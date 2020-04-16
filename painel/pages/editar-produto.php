<?php
    $id = (int)$_GET['id'];
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` WHERE id = ?");
    $sql->execute(array($id));
    if ($sql->rowCount() == 0) {
        Painel::alert('erro', 'O produto que você está tentando editar não existe!');
        die();
    }
    $infoProduto = $sql->fetch();

    $pegaImagens = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $id");
    $pegaImagens->execute();
    $pegaImagens = $pegaImagens->fetchAll();

    if (isset($_GET['deletarImagem'])) {
        $idImagem = $_GET['deletarImagem'];
        unlink(BASE_DIR_PAINEL.'/uploads/'.$idImagem);
        MySql::conectar()->exec("DELETE FROM `tb_admin.estoque_imagens` WHERE imagem = '$idImagem'");
        Painel::alert('sucesso', 'A imagem foi excluída com sucesso!');
        $pegaImagens = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $id");
        $pegaImagens->execute();
        $pegaImagens = $pegaImagens->fetchAll();
    }

?>
<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Editando Produto: <?php echo $id;?> </h2>
    <div class="card-title"><i class="far fa-image"></i> Imagens do produto:</div>
    <div class="boxes">
        <?php
        foreach($pegaImagens as $key => $value ) { 
            
        ?>
        <div class="box-single-wraper">
            <div style="border: 1px solid #ccc;padding:8px 15px;" >
                <div style="width:100%;float: left;" class="box-imgs">
                    <img class="img-square" src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['imagem'];?> " alt="">
                </div><!--box-imgs-->
                <div class="clear"></div>
                <div style="text-align:center;" class="group-btn">                       
                    <a class="btn delete"  href="<?php echo INCLUDE_PATH_PAINEL ?>editar-produto?id=<?php echo $id;?>&deletarImagem=<?php echo $value['imagem'];?>"><i class="fa fa-times"></i> Excluir</a>
                </div><!--group-btn-->                
                
            </div>
        </div><!--box-single-wraper-->
        <?php }?>
    </div><!--boxes-->
    <div class="card-title"><i class="fas fa-info-circle"></i> Informações do produto:</div>
    <form method="post" enctype="multipart/form-data">
 
 <div class="form-group">
     <label>Nome do Produto:</label>
     <input type="text" name="nome" value="<?php echo $infoProduto['nome'];?>">
 </div><!--form-group-->

 <div class="form-group">
     <label>Descrição do Produto:</label>
     <textarea name="descricao"  ><?php echo $infoProduto['descricao'];?></textarea>
 </div><!--form-group-->

 <div class="form-group">
     <label>Largura do Produto:</label>
     <input type="number" name="largura" min="0" max="900" value="<?php echo $infoProduto['largura'];?>">
 </div><!--form-group-->
 
 <div class="form-group">
     <label>Altura do Produto:</label>
     <input type="number" name="altura" min="0" max="900" value="<?php echo $infoProduto['altura'];?>">
 </div><!--form-group-->
 
 <div class="form-group">
     <label>Comprimento do Produto:</label>
     <input type="number" name="comprimento" min="0" max="900" value="<?php echo $infoProduto['comprimento'];?>">
 </div><!--form-group-->

 <div class="form-group">
     <label>Peso do Produto:</label>
     <input type="number" name="peso" min="0" max="50000" value="<?php echo $infoProduto['peso'];?>">
 </div><!--form-group-->

 <div class="form-group">
     <label>Quantidade Atual do Produto:</label>
     <input type="number" name="quantidade" min="0" max="900" value="<?php echo $infoProduto['quantidade'];?>">
 </div><!--form-group-->
 
 <div class="form-group">
     <label>Selecione a Imagens:</label>
     <input multiple type="file" name="imagem[]">
 </div><!--form-group-->
 <input type="submit" name="acao" value="Atualizar Produto!">
</form>
</div><!--box-content-->
