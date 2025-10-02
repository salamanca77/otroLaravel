<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body x-data="{
    open: false,
}" :class="{
    'overflow-hidden': open
}" class="sm:overflow-auto">

    <div class="min-h-screen bg-gray-100">

        @include('layouts.includes.control-vehicular.navigation')

        @include('layouts.includes.control-vehicular.sidebar')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
                @isset($action)
                    <div class="mb-4">
                        {{ $action }}
                    </div>
                @endisset
                {{ $slot }}
            </div>
        </div>
    </div>

    @stack('modals')
    @stack('scripts')
    @livewireScripts
</body>

</html>
