<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            @if(Auth::user()->tipo == 1)
            <li class="nav-item start {{ request()->is('sistema/user', 'sistema/user/*') ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa-2x fas fa-user"></i>
                    <span class="title">Usuários</span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ request()->is('sistema/user/create') ? 'active open' : '' }}">
                        <a href="{{ route('user.create') }}" class="nav-link ">
                            <span class="title">Adicionar Usuários</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start {{ request()->is('sistema/user') ? 'active open' : '' }}">
                        <a href="{{ route('user.index') }}" class="nav-link ">
                            <span class="title">Listar Usuários</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            <li class="nav-item start {{ request()->is('sistema/banner', 'sistema/banner/*') ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa-2x fas fa-image"></i>
                    <span class="title">Banner</span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ request()->is('sistema/banner/create') ? 'start active open' : '' }}">
                        <a href="{{ route('banner.create') }}" class="nav-link ">
                            <span class="title">Adicionar Banner</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('sistema/banner') ? 'start active open' : '' }}">
                        <a href="{{ route('banner.index') }}" class="nav-link ">
                            <span class="title">Listar Banner</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start {{ request()->is('sistema/destaque', 'sistema/destaque/*') ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa-2x fas fa-star"></i>
                    <span class="title">Destaque</span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ request()->is('sistema/destaque/create') ? 'start active open' : '' }}">
                        <a href="{{ route('destaque.create') }}" class="nav-link ">
                            <span class="title">Adicionar Destaque</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('sistema/destaque') ? 'start active open' : '' }}">
                        <a href="{{ route('destaque.index') }}" class="nav-link ">
                            <span class="title">Listar Destaque</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start {{ request()->is('sistema/processo', 'sistema/processo/*') ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa-2x fas fa-paper-plane"></i>
                    <span class="title">Processo</span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ request()->is('sistema/processo/create') ? 'start active open' : '' }}">
                        <a href="{{ route('banner.create') }}" class="nav-link ">
                            <span class="title">Adicionar Processo</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('sistema/processo') ? 'start active open' : '' }}">
                        <a href="{{ route('banner.index') }}" class="nav-link ">
                            <span class="title">Listar Processo</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ request()->is('sistema/trabalho', 'sistema/trabalho/*') ? 'start active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa-2x fas fa-briefcase"></i>
                    <span class="title">Trabalho</span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ request()->is('sistema/trabalho/create') ? 'start active open' : '' }}">
                        <a href="{{ route('trabalho.create') }}" class="nav-link ">
                            <span class="title">Adicionar Trabalho</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('sistema/trabalho') ? 'start active open' : '' }}">
                        <a href="{{ route('trabalho.index') }}" class="nav-link ">
                            <span class="title">Listar Trabalho</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start {{ request()->is('sistema/portifolio', 'sistema/portifolio/*') ? 'active open' : '' }}">
                <a href="{{ route('portifolio.index') }}" class="nav-link nav-toggle">
                    <i class="fa-2x far fa-images"></i>
                    <span class="title">Portfólio</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('sistema/contato', 'sistema/contato/*') ? 'start active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa-2x fas fa-user"></i>
                    <span class="title">Contato</span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ request()->is('sistema/contato') ? 'start active open' : '' }}">
                        <a href="{{ route('contato.index') }}" class="nav-link ">
                            <span class="title">Listar Contato</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start {{ request()->is('sistema/site', 'sistema/site/*') ? 'active open' : '' }}">
                <a href="{{ route('site.index') }}" class="nav-link nav-toggle">
                    <i class="fa-2x fa fa-desktop"></i>
                    <span class="title">Veja o Site</span>
                    <span class="selected"></span>
                </a>
            </li>

        </ul>

    </div>
</div>