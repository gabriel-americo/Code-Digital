@extends('sistema.templates.master')

@section('conteudo-view')

<div class="page-content-wrapper">
    <div class="page-content">
        <h1 class="page-title">
            <small>Bem-vindo ao sistema de gerenciamento!</small>
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{ route('sistema.index') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
        </div>

        <div class="row">
            @if(Auth::user()->tipo == 1)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="{{ $count_user }}">0</span>
                            </h3>
                            <small>USUÁRIOS</small>
                        </div>
                        <div class="icon">
                            <i class="fa-2x fas fa-user"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-red-haze">
                                <span data-counter="counterup" data-value="{{ $count_banner }}">0</span>
                            </h3>
                            <small>BANNERS</small>
                        </div>
                        <div class="icon">
                            <i class="fa-2x fas fa-image"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection