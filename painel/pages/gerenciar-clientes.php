
<div class="box-content">
    <h2><i class="far fa-list-alt"></i> Clientes Cadastrados</h2>
    
    <div class="boxes">
    <?php
        for ($i=0; $i < 6; $i++) { 
                
        ?>
        <div class="box-single-wraper">
            <div class="box-single">
                <div class="topo-box">
                    <h2><i class="fa fa-user" ></i></h2>
                </div><!--topo-box-->

                <div class="body-box">
                    <p><b><i class="fa fa-pen" ></i> Nome:</b> Danilo</p>
                    <p><b><i class="fa fa-envelope-open-text" ></i> E-mail:</b> dansol@ig.com.br</p>
                    <p><b><i class="fa fa-pen" ></i> Tipo:</b> Físico</p>
                    <p><b><i class="fa fa-pen" ></i> CPF:</b> 000.000.000-00</p>
                    <div class="group-btn">
                    <a class="btn edit" href=""><i class="fa fa-pen" ></i> Editar</a>
                        <a class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fa fa-times"></i> Excluir</a>
                    </div><!--group-btn-->
                </div><!--body-box-->

            </div><!--box-single-->
        </div><!--box-single-wraper-->

        <?php } ?>

        <div class="clear"></div>

    </div><!--boxes-->

</div><!--box-content-->