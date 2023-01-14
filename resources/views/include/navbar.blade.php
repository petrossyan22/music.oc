<nav id="navbar">
    <a class="logo navbar_link nav-link" href="{{ url('/') }}">
        <img src="/favicon.png" alt="icon" height="20px">
        &nbsp; ARSHAK PETROSYAN
    </a>
    <a href="{{ url('/') }}" id="sm_logo">
        <img src="/favicon.png" alt="icon" height="20px">
    </a>
    <i id="open_search_form" class="fa fa-search"></i>
    <i id="close_search_form" class="fa fa-arrow-left"></i>
    <form method="GET" id="search_form" action="/search">
        @csrf
        <input id="search" name="search" type="search" placeholder="Search" aria-label="Search">
        <button type="submit">
            <i class="fa fa-search"></i>
        </button>
    </form>

    <ul id="right_nav">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
            @else
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="/home" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <span style="color: rgb(124, 22, 192);;margin-right: 5px;"></span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                    <li class="nav-item">
                        <i class="fa fa-sign-out nav-link" title="Logout"></i>
                    </li>
                </a>
        @endguest
    </ul>
</nav>