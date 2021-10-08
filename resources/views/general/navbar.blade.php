<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ACE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="{{ route('tratamientos.index') }}" class="nav-link {{ Request::is('tratamientos*') ? 'active' : '' }}">
                    Tratamientos
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contratacions.index') }}" class="nav-link {{ Request::is('contratacions*') ? 'active' : '' }}">
                    Contratacions
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
