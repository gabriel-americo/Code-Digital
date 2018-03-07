@extends('sistema.templates.master')

@section('conteudo-view')

<div class="page-content-wrapper">
    <div class="page-content">
        <h1 class="page-title"> Usuários </h1>
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

        @include('sistema.templates.modal')

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fas fa-user font-dark"></i>
                            <span class="caption-subject bold uppercase"> Usuários</span>
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
                                        <a href="{{ route('user.create') }}" class="btn sbold green"> Adicionar
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Ferramentas
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:window.print()">
                                                    <i class="fas fa-print"></i> Imprimir </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="far fa-file-pdf"></i> Salvar como PDF </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="far fa-file-excel"></i> Exportar para Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1" data-form="deleteForm">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th> # </th>
                                    <th> CPF </th>
                                    <th> Nome </th>
                                    <th> Telefone </th>
                                    <th> Nascimento </th>
                                    <th> Sexo </th>
                                    <th> E-mail </th>
                                    <th> Status </th>
                                    <th> Permissão </th>
                                    <th> Opções </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>{{ $user->id }} </td>
                                    <td>{{ $user->formatted_cpf }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->formatted_phone }}</td>
                                    <td>{{ $user->formatted_birth }}</td>
                                    <td>{{ $user->formatted_gender }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>{{ $user->permission }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Ações
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ route('user.edit', $user->id) }}"> <i class="icon-docs"></i> Editar </a>
                                                </li>
                                                <li>
                                                    <div class="trash">
                                                        {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete', 'class' =>'form-delete']) !!}
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