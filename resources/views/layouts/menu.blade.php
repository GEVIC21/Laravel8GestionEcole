<li class="nav-item">
    <a href="{{ route('etudiants.index') }}"
       class="nav-link {{ Request::is('etudiants*') ? 'active' : '' }}">
        <p>Etudiants</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('filieres.index') }}"
       class="nav-link {{ Request::is('filieres*') ? 'active' : '' }}">
        <p>Filieres</p>
    </a>
</li>


