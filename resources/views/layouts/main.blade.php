<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Document')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-brands/css/uicons-brands.css'>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-white text-zinc-50">

    
    @livewire('navbar')

    <div>
        @yield('home')
    </div>

    
    
    @livewireScripts
</body>
</html>