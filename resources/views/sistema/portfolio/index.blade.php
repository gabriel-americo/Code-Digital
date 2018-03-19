@extends('sistema.templates.master')

@section('conteudo-view')

<div class="page-content-wrapper">
    <div class="page-content">
        <h1 class="page-title"> Portfolios </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{ route('sistema.index') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Portfolios</span>
                </li>
            </ul>
        </div>

        @include('sistema.templates.modal')

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fas fa-images font-dark"></i>
                            <span class="caption-subject bold uppercase"> Portfolios</span>
                        </div>
                    </div>

                    @if(session('success'))
                    <h4>{{ session('success')['message'] }}</h4>
                    @endif

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ route('categoria.create') }}" class="btn sbold green"> Adicionar Categoria
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Categoria 1</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-pencil"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <a href="" class="btn sbold green"> Adicionar
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-2">
                                    <div class="thumbnail">
                                        <img src="/img/background/wallhaven-107981.jpg" alt=""
                                             style="width: 100%; height: 200px;">
                                        <div class="caption">
                                            <h3>Teste</h3>
                                            <p>Ativo </p>
                                            <p class="pull-left button-mr10">
                                                <a href="{{ route('banner.edit', 1) }}" class="btn blue">
                                                    <i class="icon-pencil"></i> Editar </a>
                                                {!! Form::open(['route' => ['banner.destroy', 1], 'method' => 'delete', 'class' =>'form-delete']) !!}
                                                @include('sistema.templates.formulario.submit', ['input' => 'Excluir', 'attributes' => ['class' => 'btn btn-danger']])
                                                {!! Form::close() !!}
                                            </p>
                                        </div>
                                    </div>
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