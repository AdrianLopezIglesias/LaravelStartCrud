<li class="nav-item">
    <a href="{{ route('teclados.index') }}"
       class="nav-link {{ Request::is('teclados*') ? 'active' : '' }}">
        <p>Teclados</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('mice.index') }}"
       class="nav-link {{ Request::is('mice*') ? 'active' : '' }}">
        <p>Mice</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('projects.index') }}"
       class="nav-link {{ Request::is('projects*') ? 'active' : '' }}">
        <p>Projects</p>
    </a>
</li>


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


