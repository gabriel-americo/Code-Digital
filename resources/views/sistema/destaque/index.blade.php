@extends('sistema.templates.master')

@section('conteudo-view')

<div class="page-content-wrapper">
    <div class="page-content">
        <h1 class="page-title"> Destaques </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{ route('sistema.index') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Destaques</span>
                </li>
            </ul>
        </div>

        @include('sistema.templates.modal')

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fas fa-user font-dark"></i>
                            <span class="caption-subject bold uppercase"> Destaques</span>
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
                                        <a href="{{ route('destaque.create') }}" class="btn sbold green"> Adicionar
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped table-hover table-checkable order-column" id="sample_1" data-form="deleteForm">
                            <thead>
                                <tr>
                                    <th> #</th>
                                    <th> Icone</th>
                                    <th> Titulo</th>
                                    <th> Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($destaques as $destaque)
                                <tr class="odd gradeX">
                                    <td>{{ $destaque->id }} </td>
                                    <td>{{ $destaque->icone }}</td>
                                    <td>{{ $destaque->titulo }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Ações
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ route('user.edit', $destaque->id) }}"> <i class="icon-docs"></i> Editar </a>
                                                </li>
                                                <li>
                                                    <div class="trash">
                                                        {!! Form::open(['route' => ['destaque.destroy', $destaque->id], 'method' => 'delete', 'class' =>'form-delete']) !!}
                                                        <i class="icon-trash"></i> @include('sistema.templates.formulario.submit', ['input' => 'Excluir', 'attributes' => ['class' => 'input-trash']])
                                                        {!! Form::close() !!}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection