<?php
    $parametros = \views\mainView::$par;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Imobiliário</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/style.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/css/all.css">  <!--load all styles fontawesomne-->
    
</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?>"/>

<header>
    <div class="container">
        <div class="logo"><a style="color:inherit;" href="<?php echo INCLUDE_PATH ?>"> Portal Imobiliário</a></div>
        <nav class="desktop">      
            <ul>
            <?php
                $selectEmpreend = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.empreendimentos` ORDER BY order_id ASC");
                $selectEmpreend->execute();
                $empreendimentos = $selectEmpreend->fetchAll();
                foreach ($empreendimentos as $key => $value) {                    
            ?>
                <li><a href=" <?php echo INCLUDE_PATH.$value['slug']; ?> "> <?php echo $value['nome']; ?></a></li>
            <?php } ?>
            </ul>
        </nav>
        <div class="clear"></div>
    </div><!--container-->
</header>

<section class="search1">
    <div class="container">
        <h2>O que você procura?</h2>
        <input type="text" name="texto-busca">
    </div><!--container-->
</section>

<section class="search2">
    <div class="container">
        <form action="<?php echo INCLUDE_PATH ?>ajax/formularios.php" method="post">
            <div class="form-group">
                <label>Área mínima: </label>
                <input type="number" name="areao_minima" min="0" step="10">
            </div><!--form-group-->

            <div class="form-group">
                <label>Área máxima: </label>
                <input type="number" name="areao_maxima" min="0" step="10">
            </div><!--form-group-->

            <div class="form-group">
                <label>Preço mínimo: </label>
                <input type="text" name="preco_min">
            </div><!--form-group-->

            <div class="form-group">
                <label>Preço máximo: </label>
                <input type="text" name="preco_max">
            </div><!--form-group-->
            <?php 
                if(isset($parametros['slug_empreendimento'])){
                    echo '<input type="hidden" name"slug_empreendimento" value"'.$parametros['slug_empreendimento'].'"">';
                }
            ?>
        </form>
        <div class="clear"></div>
    </div><!--container-->
</section>
    
