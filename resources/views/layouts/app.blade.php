<!DOCTYPE html>
<html lang="es">
<head>
    @include('layouts.head')
</head>
    <body>
        @include('layouts.header')
        <div class="content" style="min-height: 500px">
            @yield('content')
        </div>

        <div class="footer">
            @include('layouts.footer')
        </div>
    </body>
</html>

