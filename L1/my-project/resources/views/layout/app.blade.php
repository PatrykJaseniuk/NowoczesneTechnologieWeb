<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
       @include('layout.header')
    </header>
    <main>
        @yield('wnetrze')
    </main>

    <footer>
        @include('layout.footer')
    </footer>

    <style>
        .active
        {
            color: tomato;
        }
    </style>
</body>
</html>
