<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header-utilities">
            <div class="header__inner">
                <a href="/" class="header__logo">Todo</a>
            </div>
            <div class="header__nav">
                <nav class="header__nav-item">
                    <a href="/categories" class="header__nav-item--link">カテゴリ一覧</a>
                </nav>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>