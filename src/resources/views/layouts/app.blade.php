<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <nav>
                <h1><a class="header__logo-link" href="/">Todo
                </a></h1>
                <ul class="category--btn">
                    <li>
                        <a href="/category">カテゴリ一覧</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- {{-- settionメッセージ --}} -->
        @if (session('message'))
        <div class="success-msg_container">
            <div class="success-msg">
                {{ session('message') }}
            </div>
        </div>
        @endif

        <!-- {{-- エラーメッセージ --}}
        @error('content')
        <div class="error__container">
            <div class="error">
                {{ $message }}
            </div>
        </div>
        @enderror -->
    </header>





    <main>
        @yield('content')
    </main>
    </div>
</body>

</html>
<style>



</style>