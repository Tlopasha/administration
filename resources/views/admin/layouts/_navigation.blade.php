<header class="navbar navbar-default navbar-static-top" id="top" role="banner">

    <div class="container">

        <div class="navbar-header">

            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="#" class="navbar-brand">
                Administration
            </a>

        </div>

        <nav id="bs-navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav">

            </ul>

            <ul class="nav navbar-nav navbar-right">

                @if(auth()->check())

                    <li class="dropdown" id="user-menu">

                        <a href="#user-menu" rel="user-menu" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                            <i class="fa fa-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">

                            <li>
                                <a href="{{ route('admin.auth.logout') }}">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                            </li>

                        </ul>

                    </li>

                @else

                    <li>
                        <a href="{{ route('admin.auth.login') }}">
                            Login
                        </a>
                    </li>

                @endif

            </ul>

        </nav>

    </div>

</header>
