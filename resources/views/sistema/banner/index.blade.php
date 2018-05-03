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

                        <div class="portfolio-content portfolio-1">
                            <div id="js-grid-juicy-projects" class="cbp">
                                @foreach($banners as $banner)
                                <div class="cbp-item graphic" data-form="deleteForm">
                                    <div class="cbp-caption">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="/img/background/{{ $banner->imagem }}" alt="{{ $banner->nome }}"> </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    <a href="{{ route('banner.edit', $banner->id) }}" class="cbp-l-caption-buttonLeft btn blue uppercase"> <i class="icon-pencil"></i> Editar </a>
                                                    {!! Form::open(['route' => ['banner.destroy', $banner->id], 'method' => 'delete', 'class' =>'form-delete delete-banner']) !!}
                                                    @include('sistema.templates.formulario.submit', ['input' => 'Excluir', 'attributes' => ['class' => 'cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase']])
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbp-l-grid-projects-title uppercase text-center">{{ $banner->nome }}</div>
                                    <div class="cbp-l-grid-projects-desc uppercase text-center">{{ $banner->formatted_status }}</div>
                                    @if(!empty($banner->formatted_data_inicio) && !empty($banner->formatted_data_fim))
                                    <div class="cbp-l-grid-projects-desc uppercase text-center">Data inicio: {{ $banner->formatted_data_inicio }} / Data termino: {{ $banner->formatted_data_fim }}</div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection