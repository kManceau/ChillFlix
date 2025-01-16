<nav id="main-menu-container">
    <ul class="main-menu">
        <li class="menu-item">
            <a href="{{route('home')}}" class="menu-link">
                <i class="bi bi-house-fill"></i><span class="not-on-mobile">Accueil</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('movieList', 1)}}" class="menu-link">
                <i class="bi bi-film"></i><span class="not-on-mobile">Films</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('tvList', 1)}}" class="menu-link">
                <i class="bi bi-tv"></i><span class="not-on-mobile">Séries</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="/" class="menu-link">
                <i class="bi bi-star-fill"></i><span class="not-on-mobile">Favoris</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="/" class="menu-link">
                <i class="bi bi-stopwatch-fill"></i><span class="not-on-mobile">Watchlist</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="/" class="menu-link">
                <i class="bi bi-person-fill"></i><span class="not-on-mobile">Compte</span>
            </a>
        </li>
    </ul>
</nav>
