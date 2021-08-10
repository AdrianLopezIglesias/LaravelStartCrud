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


