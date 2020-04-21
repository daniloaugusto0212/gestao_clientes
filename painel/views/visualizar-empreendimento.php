<?php
    $id = $par[1];
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.empreendimentos` WHERE id =?");
    $sql->execute(array($id));

    $infoEmpreend = $sql->fetch();

    if ($infoEmpreend['nome'] == '') {
        header('Location: '.INCLUDE_PATH_PAINEL);
    }
?>
<div class="box-content">
    <h2><i class="far fa-list-alt"></i> Empreendimento: <?php echo $infoEmpreend['nome']; ?></h2>
    <div class="info-item">

        <div class="row1">
            <div class="card-title"><i class="fas fa-info-circle"></i> Imagem do Empreendimento:</div>
            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $infoEmpreend['imagem']; ?>">
        </div><!--row-->

        <div class="row2">
            <div class="card-title"><i class="fas fa-info-circle"></i> Informações do Empreendimento:</div>
            <p><i class="fa fa-pen"></i> Nome do Empreendimento: <?php echo ucfirst($infoEmpreend['nome']); ?> </p>
            <p><i class="fa fa-pen"></i> Tipo do Empreendimento: <?php echo ucfirst($infoEmpreend['tipo']); ?> </p>
        </div><!--row2-->
        <div class="clear"></div>
    </div><!--info-item-->
</div><!--box-content-->