<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionably Late</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;500;700&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Fashionably Late
            </a>
            <div class="header-nav__item">
                @if (Auth::check())
                    <form class="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="header-nav__button">logout</button>
                    </form>
                @else
                    @if (request()->is('register'))
                        <a class="header-nav__button" href="{{ route('login') }}">Login</a>
                    @elseif (request()->is('login'))
                        <a class="header-nav__button" href="{{ route('register') }}">Register</a>
                    @endif
                @endif
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>
