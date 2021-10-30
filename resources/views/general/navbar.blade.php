<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="{{ route('tratamientos.index') }}" id="link_navbar_tratamientos" class="nav-link {{ Request::is('tratamientos*') ? 'active' : '' }}">
                    Tratamientos
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contratacions.index') }}" class="nav-link {{ Request::is('contratacions*') ? 'active' : '' }}">
                    Contratacions
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profesionals.index') }}" class="nav-link {{ Request::is('profesionals*') ? 'active' : '' }}">
                    Profesionales
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('salons.index') }}" class="nav-link {{ Request::is('salons*') ? 'active' : '' }}">
                    Salones
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('citas.index') }}" class="nav-link {{ Request::is('citas*') ? 'active' : '' }}">
                    Citas
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pacientes.index') }}" class="nav-link {{ Request::is('pacientes*') ? 'active' : '' }}">
                    Pacientes
                </a>
            </li>


    </div>
</nav>
