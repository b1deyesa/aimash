<!DOCTYPE html>
<html lang="en">
<head>
    
    {{-- Meta --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Title --}}
    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}" type="image/x-icon">
    
    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
    
    @livewireStyles
</head>
<body @if($class) class="{{ $class }}" @endif>
    
    {{-- Slot --}}
    {{ $slot }}
    
    @stack('scripts')
    @livewireScripts
</body>
</html>