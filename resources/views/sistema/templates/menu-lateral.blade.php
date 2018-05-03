<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            @if(Auth::user()->tipo == 1)
            <li class="nav-item start {{ request()->is('sistema/user', 'sistema/user/*') ? 'active open' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link nav-toggle">
                    <i class="fas fa-user"></i>
                    <span class="title">Usuários</span>
                    <span class="selected"></span>
                </a>
            </li>
            @endif
            <li class="nav-item start {{ request()->is('sistema/banner', 'sistema/banner/*') ? 'active open' : '' }}">
                <a href="{{ route('banner.index') }}" class="nav-link nav-toggle">
                    <i class="fas fa-image"></i>
                    <span class="title">Banner</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start {{ request()->is('sistema/destaque', 'sistema/destaque/*') ? 'active open' : '' }}">
                <a href="{{ route('destaque.index') }}" class="nav-link nav-toggle">
                    <i class="fas fa-star"></i>
                    <span class="title">Destaque</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('sistema/processo', 'sistema/processo/*') ? 'start active open' : '' }}">
                <a href="{{ route('processo.index') }}" class="nav-link nav-toggle">
                    <i class="fas fa-paper-plane"></i>
                    <span class="title">Processo</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('sistema/trabalho', 'sistema/trabalho/*') ? 'start active open' : '' }}">
                <a href="{{ route('trabalho.index') }}" class="nav-link nav-toggle">
                    <i class="fas fa-briefcase"></i>
                    <span class="title">Trabalho</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('sistema/portifolio', 'sistema/portifolio/*') ? 'start active open' : '' }}">
                <a href="{{ route('portifolio.index') }}" class="nav-link nav-toggle">
                    <i class="far fa-images"></i>
                    <span class="title">Portfólio</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('sistema/contato', 'sistema/contato/*') ? 'start active open' : '' }}">
                <a href="{{ route('contato.index') }}" class="nav-link nav-toggle">
                    <i class="fas fa-user"></i>
                    <span class="title">Contato</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('home') }}" target="_blank" class="nav-link nav-toggle">
                    <i class="fa fa-desktop"></i>
                    <span class="title">Veja o Site</span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </div>
</div>
