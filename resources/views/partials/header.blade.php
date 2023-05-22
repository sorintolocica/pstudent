<!-- Header -->
<header id="header" class="transparent-nav">
    <div class="container">

        <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
                <a class="logo" href="/">
                    PStudent
                </a>
            </div>
            <!-- /Logo -->

            <!-- Mobile toggle -->
            <button class="navbar-toggle">
                <span></span>
            </button>
            <!-- /Mobile toggle -->
        </div>

        <!-- Navigation -->
        <nav id="nav">
            <ul class="main-menu nav navbar-nav navbar-right">
                <li><a href="/">Acasa</a></li>
                <li><a href="/news">Știri</a></li>
                <li><a href="#">Despre noi</a></li>
                <li><a href="#">Contacteaza-ne</a></li>
                <li>
                    @auth
                        <div class="dropdown">
                            <a class="login-icon dropdown-toggle" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/add-news">Adauga o stire</a>
                                <a class="dropdown-item" href="/categories/create">Categorie noua</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Deconectare
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="login-icon"><i class="fa fa-user"></i> Autentificare</a>
                    @endauth
                </li>

            </ul>
        </nav>
        <!-- /Navigation -->

    </div>
</header>
<!-- /Header -->

