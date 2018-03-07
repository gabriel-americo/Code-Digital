<div class="form-body">
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'CPF', 'input' => 'cpf', 'attributes' => ['class' => 'form-control', 'id' => 'mask_cpf']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Nome', 'input' => 'name', 'attributes' => ['class' => 'form-control']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Telefone', 'input' => 'phone', 'attributes' => ['class' => 'form-control', 'id' => 'mask_phone']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Nascimento', 'input' => 'birth', 'attributes' => ['class' => 'form-control', 'id' => 'mask_date']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'E-mail', 'input' => 'email', 'attributes' => ['class' => 'form-control']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.text', ['label' => 'Notas', 'text' => 'notes', 'attributes' => ['class' => 'form-control', 'rows' => '3']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.select', ['label' => 'Sexo', 'select' => 'gender', 'data' => ['M' => 'Masculino', 'F' => 'Feminino'], 'attributes' => ['class' => 'form-control']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.password', ['label' => 'Senha', 'input' => 'password', 'attributes' => ['class' => 'form-control']])
    </div>
</div>