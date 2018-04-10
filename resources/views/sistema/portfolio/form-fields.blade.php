<div class="form-body">
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Nome', 'input' => 'nome', 'attributes' => ['class' => 'form-control']])
    </div>

    <div class="form-group ">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 160px; height: 140px;"> </div>
            <div>
                <span class="btn red btn-outline btn-file">
                    <span class="fileinput-new"> Selecione a imagem </span>
                    <span class="fileinput-exists"> Mudar </span>
                    <input type="file" name="imagem"> </span>
                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover </a>
            </div>
        </div>
        <p class="help-block"> Coloque uma imagem JPG. </p>
    </div>

    <div class="form-group ">
        @include('sistema.templates.formulario.select', ['label' => 'Categoria', 'select' => 'categoria_portifolio_id', 'data' => $categoria_list, 'attributes' => ['placeholder' => 'Selecione uma categoria']])
    </div>
</div>