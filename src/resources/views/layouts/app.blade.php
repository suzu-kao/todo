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
                <h1>@yield('title')</h1>
            </nav>
        </div>
    </header>

    
    {{-- settionメッセージ --}}
    @if (session('message'))
    <div class="success-msg">
        {{ session('message') }}
    </div>
    @endif

    

    <main>
        @yield('content')
    </main>
    </div>
</body>

</html>
<style>



</style>