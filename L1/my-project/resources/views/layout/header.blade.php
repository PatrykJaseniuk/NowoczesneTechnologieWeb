<h1>Naglowek</h1>
<nav>
    <h2>nawigacja</h2>
    <ul>
        <li>
            <a href="\"
            class="{{ request()->is('/') ? 'active' : '' }}"> index  </a>
        </li>
        <li>
            <a href="dodajPytanie"
            class="{{ request()->is('dodajPytanie') ? 'active' : '' }}">dodaj pytanie </a>
        </li>
    </ul>
</nav>
