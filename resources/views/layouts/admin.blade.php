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

    @stack('css')
    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/6a7039d20d.js" crossorigin="anonymous"></script>

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

    @include('layouts.includes.admin.navigation')

    @include('layouts.includes.admin.sidebar')


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

    <div x-cloak x-show="open" x-on:click="open = false"
        class="bg-gray-900 bg-opacity-50 fixed inset-0 z-30 sm:hidden">
    </div>

    @stack('modals')

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('swal', data => {
            Swal.fire(data[0]);
        });
    </script>

    @if (session('swal'))
        {
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
        }
    @endif

    @stack('js')

</body>

</html>
