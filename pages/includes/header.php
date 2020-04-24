<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Imobiliário</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/style.css">
</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?>"/>

<header>
    <div class="container">
        <div class="logo">Portal Imobiliário</div>
        <nav class="desktop">
            <ul>
                <li><a href=""> Centro Empresarial 1</a></li>
                <li><a href=""> Centro Empresarial 2</a></li>
                <li><a href=""> Centro Empresarial 3</a></li>
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
        </form>
    </div><!--container-->
</section>
    
