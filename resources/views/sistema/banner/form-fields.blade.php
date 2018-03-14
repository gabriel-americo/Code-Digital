<div class="form-body">
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Nome', 'input' => 'nome', 'attributes' => ['class' => 'form-control']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.file', ['note' => 'Coloque uma imagem JPG.', 'label' => 'Imagem', 'file' => 'imagem'])
    </div>

    <div class="form-group">
        <div class="form-inline">
            <div class="form-group">
                @include('sistema.templates.formulario.input', ['label' => '', 'input' => 'data_inicio', 'attributes' => ['class' => 'form-control', 'placeholder' => 'Data inicio', 'id' => 'mask_date']])
            </div>

            <div class="form-group">
                @include('sistema.templates.formulario.input', ['label' => '', 'input' => 'data_fim', 'attributes' => ['class' => 'form-control', 'placeholder' => 'Data fim', 'id' => 'mask_date']])
            </div>

        </div>
    </div>

    <div class="form-group">
        @include('sistema.templates.formulario.checkbox', ['label' => 'Ativo', 'checkbox' => 'ativo', 'value' => 1])
    </div>
</div>