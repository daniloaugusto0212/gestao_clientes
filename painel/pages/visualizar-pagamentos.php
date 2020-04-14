<div class="box-content">
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

            <?php
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.financeiro` WHERE status = 0 ORDER BY vencimento ASC");
                $sql->execute();
                $pendentes = $sql->fetchAll();

                foreach ($pendentes as $key => $value) {
                    $clienteNome = MySql::conectar()->prepare("SELECT `nome` FROM `tb_admin.clientes` WHERE id = $value[cliente_id] ");
                    $clienteNome->execute();
                    $clienteNome =$clienteNome->fetch()['nome'];
                    ?>
                <tr>
                    <td> <?php echo $value['nome'];?> </td>
                    <td> <?php echo $clienteNome;?> </td>
                    <td><?php echo $value['valor'];?></td>
                    <td><?php echo date('d/m/Y',strtotime($value['vencimento']));?></td>
                    
                </tr>
                <?php } ?>
            

            
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

   

</div><!--box-content-->