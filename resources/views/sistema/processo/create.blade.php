@extends('sistema.templates.master')

@section('conteudo-view')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h1 class="page-title"> Processo </h1>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="{{ route('sistema.index') }}">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Processos</span>
                    </li>
                </ul>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-12 ">
                    <div class="portlet light ">
                        <div class="portlet-body form">
                            {!! Form::open(['route' => 'processo.store', 'method' => 'post', 'files' => true]) !!}
                            @include('sistema.processo.form-fields')
                            <div class="form-actions left">
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