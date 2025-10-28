<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div header-utilities>
                <h1 class="header__title">FashionablyLate</h1>
            </div>
            <nav>
                <!--後で入力-->
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>