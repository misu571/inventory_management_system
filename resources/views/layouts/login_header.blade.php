<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
            </a>
        </div>
        <div class="login-menu">
            <ul>
                <li>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('home') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>