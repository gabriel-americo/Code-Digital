<div class="form-body">
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Icone', 'input' => 'icone', 'attributes' => ['class' => 'form-control']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Titulo', 'input' => 'titulo', 'attributes' => ['class' => 'form-control']])
    </div>

    <div class="form-group">
        <label>Texto</label>
        <div name="texto" id="summernote_1"> </div>
    </div>

</div>