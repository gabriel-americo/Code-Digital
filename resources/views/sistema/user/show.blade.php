@extends('sistema.templates.master')

@section('conteudo-view')

<div class="page-content-wrapper">
    <div class="page-content">
        <h1 class="page-title"> Usuário </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{ route('sistema.index') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Usuários</span>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="profile-sidebar">
                    <div class="portlet light profile-sidebar-portlet ">
                        <div class="profile-userpic">
                            <img src="/img_sistema/perfil/{{ $user->imagem }}" class="img-responsive" alt=""> 
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"> {{ $user->nome }} </div>
                        </div>
                        <div class="profile-userbuttons">
                            <button type="button" class="btn btn-circle green btn-sm">Editar</button>
                            <button type="button" class="btn btn-circle red btn-sm">Excluir</button>
                        </div>
                        <div class="profile-usermenu"> </div>
                    </div>

                    <div class="portlet light ">
                        <div>
                            <h4 class="profile-desc-title">Dados</h4>
                            <div class="desc"> CPF: {{ $user->cpf }} </div>
                            <div class="desc"> Nascimento: {{ $user->formatted_nascimento }} </div>
                            <div class="desc"> Telefone: {{ $user->formatted_telefone }} </div>
                            <div class="desc"> Sexo: {{ $user->formatted_sexo }} </div>
                            <div class="desc"> E-mail: {{ $user->email }} </div>
                            <div class="desc"> Status: {{ $user->status }} </div>
                        </div>
                    </div>
                </div>

                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <i class="icon-bar-chart theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Descrição</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <p>{{ $user->descricao }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection