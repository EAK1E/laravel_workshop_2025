<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบ ออนไลน์</title>


    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    @yield('content')
    
    @livewireScripts
</body>
</html>