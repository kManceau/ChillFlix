<header id="main-nav-container">
    <nav class="container-fluid">
        <ul class="main-nav">
            <li class="main-nav-left">
                <ul class="main-nav-group">
                    <li><a href="{{route('home')}}" class="menu-brand"><h1>ChillFlix</h1></a></li>
                </ul>
            </li>
            <li class="main-nav-right">
                <ul class="main-nav-group">
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('account') }}" class="nav-link">
                                <i class="bi bi-person-fill"></i>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">
                                <i class="bi bi-person-fill"></i><span>Compte</span>
                            </a>
                        </li>
                    @endauth
                </ul>
            </li>
        </ul>
    </nav>
</header>
