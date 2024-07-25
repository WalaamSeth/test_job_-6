<!DOCTYPE html>
<html>
<head>
    <title>Multiregion Project</title>
</head>
<body>
<header>
    @if(session('selected_city'))
        <p>Выбранный город: {{ session('selected_city')->name }}</p>
    @endif
    <nav>
        <a href="/">Главная</a>
        <a href="/about">О нас</a>
        <a href="/news">Новости</a>
    </nav>
</header>

<main>
    @yield('content')
</main>
</body>
</html>
