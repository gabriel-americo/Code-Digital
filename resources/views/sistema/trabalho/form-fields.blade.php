<div class="form-body">
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Nome', 'input' => 'nome', 'attributes' => ['class' => 'form-control']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.text', ['label' => 'Descrição', 'text' => 'descricao', 'attributes' => ['class' => 'form-control', 'rows' => '3']])
    </div>
    <div class="form-group ">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 158px; height: 150px;"> </div>
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
</div>