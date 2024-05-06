<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="{{ asset('img/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon-16x16.png') }}" sizes="16x16" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app-frontpage.min.css') }}">

    <title>HIMATIF | @yield('error-title')</title>
</head>

<body class="notfound">
    <main class="text-center py-5 py-md-10">
        <div class="container mx-auto sm:px-4">
            <h1 class="text-midnight font-boldest">
                @yield('error-title')
            </h1>

            <img src="{{ asset('img/illustration/404.svg') }}" alt="" class="w-3/4 w-md-32rem my-5">
            <h5 class="text-gray font-semibold mb-3">
                @yield('error-message')
            </h5>

            @if (Request::is('dashboard*'))
                <a href="{{ route('dashboard.pengurus.index') }}"
                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline btn-gradient-primary">Menuju
                    Dashboard</a>
            @else
                <a href="{{ route('frontpage.homepage') }}"
                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline btn-gradient-primary">Menuju
                    Beranda</a>
            @endif
        </div>
    </main>
</body>

</html>
