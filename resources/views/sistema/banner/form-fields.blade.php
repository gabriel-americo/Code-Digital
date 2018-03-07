<div class="form-body">
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Nome', 'input' => 'name', 'attributes' => ['class' => 'form-control']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.file', ['label' => 'Imagem', 'file' => 'imagem'])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.checkbox', ['label' => 'Ativo', 'checkbox' => 'ativo', 'value' => 1])
    </div>
</div>