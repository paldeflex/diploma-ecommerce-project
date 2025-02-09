<nav class="navbar navbar-expand navbar-light navbar-bg">
    @if($sidebarEnabled)
        <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>
    @endif

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="{{ auth()->user()->name }}" />
                    <span class="text-dark">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="align-middle me-1" data-feather="edit"></i> Редактировать профиль
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="align-middle me-1" data-feather="log-out"></i> Выйти из сайта
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
