

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


<li class="nav-item">
    <a href="{{ route('profesionals.index') }}"
       class="nav-link {{ Request::is('profesionals*') ? 'active' : '' }}">
        <p>Profesionals</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('salons.index') }}"
       class="nav-link {{ Request::is('salons*') ? 'active' : '' }}">
        <p>Salons</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('salonHorarios.index') }}"
       class="nav-link {{ Request::is('salonHorarios*') ? 'active' : '' }}">
        <p>Salon Horarios</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('profesionalHorarios.index') }}"
       class="nav-link {{ Request::is('profesionalHorarios*') ? 'active' : '' }}">
        <p>Profesional Horarios</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('instalacions.index') }}"
       class="nav-link {{ Request::is('instalacions*') ? 'active' : '' }}">
        <p>Instalacions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('profesionalTratamientos.index') }}"
       class="nav-link {{ Request::is('profesionalTratamientos*') ? 'active' : '' }}">
        <p>Profesional Tratamientos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('pacienteDatosPersonales.index') }}"
       class="nav-link {{ Request::is('pacienteDatosPersonales*') ? 'active' : '' }}">
        <p>Paciente Datos Personales</p>
    </a>
</li>


