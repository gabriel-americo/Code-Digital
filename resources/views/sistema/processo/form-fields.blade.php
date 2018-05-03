<div class="form-body">
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Icone', 'input' => 'icone', 'attributes' => ['class' => 'form-control']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Titulo', 'input' => 'titulo', 'attributes' => ['class' => 'form-control']])
    </div>

    <div class="form-group">
        <label>Texto</label>
        <textarea id="summernote_1" name="texto"></textarea>
    </div>

</div>