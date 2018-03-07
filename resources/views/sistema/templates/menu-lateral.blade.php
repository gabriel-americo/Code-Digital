<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item {{ request()->is('sistema/user', 'sistema/user/*') ? 'start active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-user"></i>
                    <span class="title">Usuários</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ request()->is('sistema/user/create') ? 'start active open' : '' }}">
                        <a href="{{ route('user.create') }}" class="nav-link ">
                            <i class="fas fa-user-plus"></i>
                            <span class="title">Adicionar Usuários</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('sistema/user') ? 'start active open' : '' }}">
                        <a href="{{ route('user.index') }}" class="nav-link ">
                            <i class="fas fa-user"></i>
                            <span class="title">Listar Usuários</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item {{ request()->is('sistema/banner', 'sistema/banner/*') ? 'start active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-image"></i>
                    <span class="title">Banner</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ request()->is('sistema/banner/create') ? 'start active open' : '' }}">
                        <a href="{{ route('banner.create') }}" class="nav-link ">
                            <i class="fas fa-images"></i>
                            <span class="title">Adicionar Banner</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('sistema/banner') ? 'start active open' : '' }}">
                        <a href="{{ route('banner.index') }}" class="nav-link ">
                            <i class="fas fa-image"></i>
                            <span class="title">Listar Banner</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item {{ request()->is('sistema/trabalho', 'sistema/trabalho/*') ? 'start active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-image"></i>
                    <span class="title">Trabalhos</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ request()->is('sistema/trabalho/create') ? 'start active open' : '' }}">
                        <a href="{{ route('banner.create') }}" class="nav-link ">
                            <i class="fas fa-images"></i>
                            <span class="title">Adicionar Trabalhos</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('sistema/trabalho') ? 'start active open' : '' }}">
                        <a href="{{ route('banner.index') }}" class="nav-link ">
                            <i class="fas fa-image"></i>
                            <span class="title">Listar Trabalhos</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item {{ request()->is('sistema/portifolio', 'sistema/portifolio/*') ? 'start active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-image"></i>
                    <span class="title">Portfolio</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ request()->is('sistema/portifolio/create') ? 'start active open' : '' }}">
                        <a href="{{ route('banner.create') }}" class="nav-link ">
                            <i class="fas fa-images"></i>
                            <span class="title">Adicionar Portfolio</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('sistema/portifolio') ? 'start active open' : '' }}">
                        <a href="{{ route('banner.index') }}" class="nav-link ">
                            <i class="fas fa-image"></i>
                            <span class="title">Listar Portfolio</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</div>