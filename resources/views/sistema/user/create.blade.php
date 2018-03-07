@extends('sistema.templates.master')

@section('conteudo-view')

<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
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

        @if(session('success'))
        <h3>{{ session('success')['message'] }}</h3>
        @endif

        <div class="row">
            <div class="col-md-12 ">
                <div class="portlet light ">
                    <div class="portlet-body form">
                        {!! Form::open(['route' => 'user.store', 'method' => 'post']) !!}
                        @include('sistema.user.form-fields')
                        <div class="form-actions right">
                            @include('sistema.templates.formulario.submit', ['input' => 'Cadastrar', 'attributes' => ['class' => 'btn green']])
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection