@extends('sistema.templates.master')

@section('conteudo-view')

<div class="page-content-wrapper">
    <div class="page-content">
        <h1 class="page-title"> Banners </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{ route('sistema.index') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Banners</span>
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
                            <span class="caption-subject bold uppercase"> Banners</span>
                        </div>
                    </div>

                    @if(session('success'))
                    <h4 class="bold">{{ session('success')['message'] }}</h4>
                    @endif

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ route('banner.create') }}" class="btn sbold green"> Adicionar
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @foreach($banners as $banner)
                            <div class="col-sm-6 col-md-3" data-form="deleteForm">
                                <div class="thumbnail">
                                    <img src="/img/background/{{ $banner->imagem }}" alt=""
                                         style="width: 100%; height: 200px;">
                                    <div class="caption">
                                        <h3>{{ $banner->nome }}</h3>
                                        <p>{{ $banner->formatted_status }} </p>
                                        @if(!empty($banner->formatted_data_inicio) && !empty($banner->formatted_data_fim))
                                        <p>Data inicio: {{ $banner->formatted_data_inicio }} </p>
                                        <p>Data fim: {{ $banner->formatted_data_fim }} </p>
                                        @endif
                                        <p class="pull-left button-mr10">
                                            <a href="{{ route('banner.edit', $banner->id) }}" class="btn blue">
                                                <i class="icon-pencil"></i> Editar </a>
                                            {!! Form::open(['route' => ['banner.destroy', $banner->id], 'method' => 'delete', 'class' =>'form-delete']) !!}
                                            @include('sistema.templates.formulario.submit', ['input' => 'Excluir', 'attributes' => ['class' => 'btn btn-danger']])
                                            {!! Form::close() !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection