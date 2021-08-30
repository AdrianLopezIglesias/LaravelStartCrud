


<li class="nav-item">
    <a href="{{ route('mensajes.index') }}"
       class="nav-link {{ Request::is('mensajes*') ? 'active' : '' }}">
        <p>Mensajes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('adm.textos.index') }}"
       class="nav-link {{ Request::is('adm/textos*') ? 'active' : '' }}">
        <p>Textos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('adm.tecnologias.index') }}"
       class="nav-link {{ Request::is('adm/tecnologias*') ? 'active' : '' }}">
        <p>Tecnologias</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('adm.projects.index') }}"
       class="nav-link {{ Request::is('projects*') ? 'active' : '' }}">
        <p>Projects</p>
    </a>
</li>


