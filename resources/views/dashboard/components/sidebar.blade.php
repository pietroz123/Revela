<div class="dashboard-logo">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('img/icons/logo.svg') }}" class="main-icon" alt="Ícone principal da página">
        <span class="brand">revela</span>
    </a>
</div>

<hr>

<div class="d-flex flex-column justify-content-center align-items-center px-3 py-2 user-info">
    <img src="https://image.flaticon.com/icons/svg/149/149071.svg" class="rounded-circle user-image mb-2" alt="">
    <p>{{ Auth::user()->name }}</p>
    <p class="subscription-plan mb-2">
        {{ Auth::user()->subscription->plan->name }}
    </p>
</div>

<hr>

<div>

    <span class="dashboard-sidebar-divider">Navegação</span>
    <ul class="dashboard-sidebar-items">
        <li class="dashboard-sidebar-item">
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i>
                Página Principal
            </a>
        </li>
        <li class="dashboard-sidebar-item">
            <a href="{{ route('dashboard.album-do-mes') }}">
                <i class="far fa-calendar-alt"></i>
                Álbum do Mês
            </a>
        </li>
        <li class="dashboard-sidebar-item">
            <a href="#!">
                <i class="fas fa-camera-retro"></i>
                Minhas Memórias
            </a>
        </li>
        <li class="dashboard-sidebar-item">
            <a href="{{ route('dashboard.meus-pedidos') }}">
                <i class="fas fa-history"></i>
                Meus Pedidos
            </a>
        </li>
        <li class="dashboard-sidebar-item">
            <a href="#!">
                <i class="fas fa-image"></i>
                Álbuns Avulsos
            </a>
        </li>
    </ul>

    <span class="dashboard-sidebar-divider">Dados Gerais</span>
    <ul class="dashboard-sidebar-items">
        <li class="dashboard-sidebar-item">
            <a href="{{ route('dashboard.dados-cadastrais') }}">
                <i class="far fa-address-card"></i>
                Dados Cadastrais
            </a>
        </li>
        <li class="dashboard-sidebar-item">
            <a href="#!">
                <i class="fas fa-cog"></i>
                Configurações
            </a>
        </li>
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