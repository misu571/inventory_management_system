<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="login.html">
                <img src="{{ asset('deskapp/vendors/images/deskapp-logo.svg') }}" alt="">
            </a>
        </div>
        <div class="login-menu">
            <ul>
                <li>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('home') }}">Dashboard</a>
                        @else
                            @if (Route::currentRouteName() == 'login')
                                <a href="{{ route('register') }}">Register</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>
                            @endif
                        @endauth
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>