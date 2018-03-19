<div class="form-body">
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'CPF', 'input' => 'cpf', 'attributes' => ['class' => 'form-control', 'id' => 'mask_cpf']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Nome', 'input' => 'nome', 'attributes' => ['class' => 'form-control']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Telefone', 'input' => 'telefone', 'attributes' => ['class' => 'form-control', 'id' => 'mask_phone']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'Nascimento', 'input' => 'nascimento', 'attributes' => ['class' => 'form-control', 'id' => 'mask_date']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.input', ['label' => 'E-mail', 'input' => 'email', 'attributes' => ['class' => 'form-control']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.text', ['label' => 'Notas', 'text' => 'descricao', 'attributes' => ['class' => 'form-control', 'rows' => '3']])
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
    <div class="form-group">
        @include('sistema.templates.formulario.select', ['label' => 'Sexo', 'select' => 'sexo', 'data' => ['M' => 'Masculino', 'F' => 'Feminino'], 'attributes' => ['class' => 'form-control']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.select', ['label' => 'Tipo de usuário', 'select' => 'tipo', 'data' => ['1' => 'Administrador', '2' => 'Usuário'], 'attributes' => ['class' => 'form-control']])
    </div>
    <div class="form-group">
        @include('sistema.templates.formulario.password', ['label' => 'Senha', 'input' => 'password', 'attributes' => ['class' => 'form-control']])
    </div>
</div>