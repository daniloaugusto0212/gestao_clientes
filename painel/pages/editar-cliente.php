<?php
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $cliente = Painel::select('tb_admin.clientes','id = ?',array($id));    
    }else{
        Painel::alert('erro','Você precisa passar o parametro ID.');
        die();
    }
?>

<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Editar Cliente</h2>

    <form  class="ajax" atualizar method="post" action="<?php echo INCLUDE_PATH_PAINEL ?>ajax/forms.php" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para funcionar o upload de imagens-->

    <div class="form-group">
            <label>Nome: </label>
            <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>E-mail: </label>
            <input type="text" name="email" value="<?php echo $cliente['email']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Tipo: </label>
            <select  name="tipo_cliente">
            <option <?php if($cliente['tipo'] == 'fisico') echo 'selected';?> value="fisico">Físico</option>
            <option <?php if($cliente['tipo'] == 'juridico') echo 'selected';?> value="juridico">Jurídico</option>               
            </select>
        </div><!--form-group-->

        <?php
            if($cliente['tipo'] == 'fisico'){
        ?>
        
        <div ref="cpf" class="form-group">
            <label>CPF</label>
            <input type="text" name="cpf" value="<?php echo $cliente['cpf_cnpj']; ?>">
        </div><!--form-group-->

        <div style="display:none;" ref="cnpj" class="form-group">
            <label>CNPJ</label>
            <input type="text" name="cnpj" >
        </div><!--form-group-->

            <?php }else { ?>
        <div style="display:none;" ref="cpf" class="form-group">
            <label>CPF</label>
            <input type="text" name="cpf">
        </div><!--form-group-->

        <div style="display:block;" ref="cnpj" class="form-group">
            <label>CNPJ</label>
            <input type="text" name="cnpj" value="<?php echo $cliente['cpf_cnpj']; ?> ">
        </div><!--form-group-->

            <?php }?>

        <div class="form-group">
            <label>Imagem</label>
            <input type="file" name="imagem" >            
        </div><!--form-group-->

        <div class="form-group">            
            <input type="hidden" name="imagem_original" value="<?php echo $cliente['imagem']; ?> ">            
        </div><!--form-group-->

        <div class="form-group">            
            <input type="hidden" name="tipo_acao" value="atualizar_cliente" >            
        </div><!--form-group-->

        <div class="form-group">            
            <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>" >            
        </div><!--form-group-->

        <div class="form-group">            
            <input type="submit" name="acao" value="Atualizar!">
        </div><!--form-group-->
    </form>

    <h2><i class="fas fa-user-edit"></i> Adicionar Pagamentos</h2>
        
    <form method="post">
<?php 
    if(isset($_POST['acao'])){
        $cliente_id = $id;
        $nome = $_POST['nome_pagto'];
        //$valor = str_replace('.','',$_POST['valor']);
        //$valor = str_replace(',','.',$valor);
        $valor = $_POST['valor'];
        $intervalo = $_POST['intervalo'];
        $vencimento = $_POST['vencimento'];
        $numero_parcelas = $_POST['parcelas'];
        $status = 0;
        $vencimentoOriginal = $_POST['vencimento']; 

        for ($i=0; $i < $numero_parcelas; $i++) { 
            $vencimento = strtotime($vencimentoOriginal) + (($i* $intervalo) * (60*60*24));
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.financeiro` VALUES (null,?,?,?,?,?)");
            $sql->execute(array($cliente_id,$nome,$valor,date('Y-m-d',$vencimento),$status ));

        }

        Painel::alert('sucesso','O pagamento foi inserido com sucesso!');
        

    }

?>

    <div class="form-group">
            <label>Nome do Pagamento </label>
            <input type="text" name="nome_pagto">
        </div><!--form-group-->
    <div class="form-group">
        <label>Valor do Pagamento</label>
        <input type="text" name="valor">
    </div><!--form-group-->
    <div class="form-group">
        <label>Número de Parcelas </label>
        <input type="text" name="parcelas">
    </div><!--form-group-->
    <div class="form-group">
        <label>Intervalo </label>
        <input type="text" name="intervalo">
    </div><!--form-group-->
    <div class="form-group">
        <label>Vencimento </label>
        <input type="text" name="vencimento">
    </div><!--form-group-->
    <div class="form-group">            
        <input type="submit" name="acao" value="Inserir Pagamento">
    </div><!--form-group-->
    </form>

    <h2><i class="fas fa-money-check-alt"></i> Pagamentos Pendentes</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td>Nome do pagamento</td>
               
                <td>Cliente</td>
                <td>Valor</td>
                <td>Vencimento</td>
                <td>#</td>
            </tr>

            
        </table>
    </div><!--wraper-table-->

    <h2><i class="fas fa-money-check-alt"></i> Pagamentos Concluídos</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td>Nome do pagamento</td>
               
                <td>Cliente</td>
                <td>Valor</td>
                <td>Vencimento</td>
                
            </tr>

            
        </table>
    </div><!--wraper-table-->

</div><!--box-conten-->