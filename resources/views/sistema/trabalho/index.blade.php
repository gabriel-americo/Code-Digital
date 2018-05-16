@extends('sistema.templates.master')

@section('conteudo-view')

<div class="page-content-wrapper">
    <div class="page-content">
        <h1 class="page-title"> Trabalhos </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{ route('sistema.index') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Trabalhos</span>
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
                            <span class="caption-subject bold uppercase"> Trabalhos</span>
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
                                        <a href="{{ route('trabalho.create') }}" class="btn sbold green"> Adicionar
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped table-hover table-checkable order-column" id="sample_1" data-form="deleteForm">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <th> #</th>
                                    <th> Nome</th>
                                    <th> Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trabalhos as $trabalho)
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1"/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>{{ $trabalho->id }} </td>
                                    <td>{{ $trabalho->nome }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Ações
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ route('trabalho.edit', $trabalho->id) }}"> <i class="icon-docs"></i> Editar </a>
                                                </li>
                                                <li>
                                                    <div class="trash">
                                                        {!! Form::open(['route' => ['trabalho.destroy', $trabalho->id], 'method' => 'delete', 'class' =>'form-delete']) !!}
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