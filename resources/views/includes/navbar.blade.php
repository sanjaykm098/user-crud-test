<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand">
            {{ config('app.name') }}
        </a>
        <div class="d-flex" role="search">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-success">
                    Dashboard
                </a>
                <form action="{{ route('logout') }}" id="logoutFrom" method="post">@csrf</form>
                <a onclick="$('#logoutFrom').submit()" class="btn ms-1 btn-danger">
                    Logout
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
            @endauth
            </d>
        </div>
    </div>
</nav>
