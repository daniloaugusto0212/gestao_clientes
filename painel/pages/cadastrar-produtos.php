<div class="box-content">
    <h2><i class="fa fa-pencil"></i> Cadastrar Produto</h2>

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
            <label>Selecione a Imagens:</label>
			<input multiple type="file" name="imagem">
        </div><!--form-group-->
        <input type="submit" name="acao" value="Cadastrar Produto!">
    </form>
</div>