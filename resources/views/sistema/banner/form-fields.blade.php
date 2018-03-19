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
                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
            </div>
        </div>
        <p class="help-block"> Coloque uma imagem JPG. </p>
    </div>

    <div class="form-group">
        <div class="form-inline">
            <div class="form-group">
                @include('sistema.templates.formulario.input', ['label' => '', 'input' => 'data_inicio', 'attributes' => ['class' => 'form-control', 'placeholder' => 'Data inicio', 'id' => 'mask_date']])
            </div>

            <div class="form-group">
                @include('sistema.templates.formulario.input', ['label' => '', 'input' => 'data_fim', 'attributes' => ['class' => 'form-control', 'placeholder' => 'Data fim', 'id' => 'mask_date3']])
            </div>
            <p class="help-block"> Caso seu banner seja promocional coloque a data que ele ficará no ar. </p>
        </div>
    </div>

    <div class="form-group">
        @include('sistema.templates.formulario.checkbox', ['label' => 'Ativo', 'checkbox' => 'status', 'value' => 1])
    </div>
</div>