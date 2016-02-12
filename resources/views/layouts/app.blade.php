<!DOCTYPE html>
<html lang="es">
<head>
    @include('layouts.head')
</head>
<body>

    <header class="row">
        @include('layouts.header')
    </header>

    <div id="main" class="row" style="min-height: 500px">
        @yield('content')
    </div>

    <footer class="row">
        @include('layouts.footer')
    </footer>

</div>
</body>
</html>

