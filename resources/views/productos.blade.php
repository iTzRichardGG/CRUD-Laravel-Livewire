<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-slate-100 ">
    @livewire('crud-productos')
    @livewireScripts
    
</body>

</html>