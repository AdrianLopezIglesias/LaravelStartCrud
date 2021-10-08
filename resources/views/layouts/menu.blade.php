

<li class="nav-item">
    <a href="{{ route('tratamientos.index') }}"
       class="nav-link {{ Request::is('tratamientos*') ? 'active' : '' }}">
        <p>Tratamientos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('contratacions.index') }}"
       class="nav-link {{ Request::is('contratacions*') ? 'active' : '' }}">
        <p>Contratacions</p>
    </a>
</li>




<li class="nav-item">
    <a href="{{ route('citas.index') }}"
       class="nav-link {{ Request::is('citas*') ? 'active' : '' }}">
        <p>Citas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('pacientes.index') }}"
       class="nav-link {{ Request::is('pacientes*') ? 'active' : '' }}">
        <p>Pacientes</p>
    </a>
</li>


