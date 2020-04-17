<div class="box-content">
    <h2><i class="fa fa-pencil"></i> Cadastrar Empreeendimento</h2>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nome: </label>
            <input type="text" name="nome">
        </div><!--form-group-->

        <div class="form-group">
            <label>Tipo: </label>
            <select name="tipo">
                <option value="residencial">Residencial</option>
                <option value="comercial">Comercial</option>
            </select>
        </div><!--form-group-->

        <div class="form-group">
            <label>Preço: </label>
            <input type="text" name="preco">
        </div><!--form-group-->

        <div class="form-group">
            <label>Preço: </label>
            <input type="file" name="imagem">
        </div><!--form-group-->

        <div class="form-group">           
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
        
    </form>

</div>
