@php
    $resolver = app(\App\Services\DashboardRouteResolverService::class);
    $dashboard = $resolver->resolve(Auth::user()->role);

    $sidebarEnabled = false;
@endphp

<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <title>Поменять название</title>

    <link href="{{ asset('dashboard/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    @if(View::exists('dashboard.partials.sidebar'))
        @php $sidebarEnabled = true; @endphp
        @include('dashboard.partials.sidebar')
    @endif
    <div class="main">
        @include('dashboard.partials.navbar')
        <main class="content">
            <div class="container-fluid p-0">
                @yield('dashboard')
            </div>
        </main>
    </div>
</div>

<script src="{{ asset('dashboard/js/app.js') }}"></script>

</body>

</html>
