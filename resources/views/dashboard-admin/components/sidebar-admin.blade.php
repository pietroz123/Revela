<div class="dashboard-logo">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('img/icons/logo.svg') }}" class="main-icon" alt="Ícone principal da página">
        <span class="brand">revela</span>
    </a>
</div>

<hr>

<div class="d-flex flex-column justify-content-center align-items-center px-3 py-2 user-info">
    @if ($pic = Auth::user()->profile_picture)
        <img src="{{ asset('storage/user_images/' . $pic) }}" class="rounded-circle user-image mb-2" alt="User Profile Picture">
    @else
        <img src="https://image.flaticon.com/icons/svg/149/149071.svg" class="rounded-circle user-image mb-2" alt="">
    @endif

    <p>{{ Auth::user()->name }}</p>

    <p class="subscription-plan mb-2">
        Administrador
    </p>
</div>

<hr>

<div>

    <span class="dashboard-sidebar-divider">Navegação</span>
    <ul class="dashboard-sidebar-items">
        <li class="dashboard-sidebar-item">
            <a href="{{ route('dashboard.admin.index') }}">
                <i class="fas fa-home"></i>
                Página Principal
            </a>
        </li>
        <li class="dashboard-sidebar-item">
            <a href="{{ route('dashboard.admin.pedidos')}}">
                <i class="fas fa-shopping-bag"></i>
                Pedidos
            </a>
        </li>
    </ul>

    {{-- <span class="dashboard-sidebar-divider">Dados Gerais</span> --}}
    <ul class="dashboard-sidebar-items">
        <li class="dashboard-sidebar-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                Sair
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>

</div>