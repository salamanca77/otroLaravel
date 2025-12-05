@php
    $links = [
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
            'can' => ['manage_dashboard'],
        ],
        [
            'header' => 'Administracion',
            'can' => ['manage_permissions', 'manage_roles', 'manage_users'],
        ],
        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-users',
            'route' => route('admin.users.index'),
            'active' => request()->routeIs('admin.users.*'),
            'can' => ['manage_users'],
        ],
        [
            'name' => 'Roles',
            'icon' => 'fa-solid fa-user-tag',
            'route' => route('admin.roles.index'),
            'active' => request()->routeIs('admin.roles.*'),
            'can' => ['manage_roles'],
        ],
        [
            'name' => 'Permisos',
            'icon' => 'fa-solid fa-key',
            'route' => route('admin.permissions.index'),
            'active' => request()->routeIs('admin.permissions.*'),
            'can' => ['manage_permissions'],
        ],

        [
            'header' => 'Control vehicular',
            'can' => ['manage_tickets', 'view_reports'],
        ],
        [
            'name' => 'Entrada',
            'icon' => 'fa-solid fa-key',
            'route' => route('controlVehicular.ticket.entrada'),
            'active' => request()->routeIs('controlVehicular.ticket.*'),
            'can' => ['manage_tickets'],
        ],
        [
            'name' => 'Salida',
            'icon' => 'fa-solid fa-key',
            'route' => route('controlVehicular.ticket.salida'),
            'active' => request()->routeIs('controlVehicular.ticket.*'),
            'can' => ['manage_tickets'],
        ],
        [
            'name' => 'Tarifa',
            'icon' => 'fa-solid fa-key',
            'route' => route('controlVehicular.ticket.lista'),
            'active' => request()->routeIs('controlVehicular.ticket.*'),
            'can' => ['manage_tickets'],
        ],
        [
            'name' => 'Reporte',
            'icon' => 'fa-solid fa-chart-line',
            'route' => route('controlVehicular.ticket.registro'),
            'active' => request()->routeIs('controlVehicular.ticket.*'),
            'can' => ['manage_tickets'],
        ],
    ];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'transform-none': open,
        '-traslate-x-full': !open
    }" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                @canany($link['can'] ?? [null])
                    <li>
                        @isset($link['header'])
                            <div class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase ">
                                {{ $link['header'] }}
                            </div>
                        @else
                            <a href="{{ $link['route'] }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                <span class="inline-flex w-6 h-6 justify-center items-center">
                                    <i class="{{ $link['icon'] }}"></i>
                                </span>
                                <span class="ms-3">{{ $link['name'] }}</span>
                            </a>
                        @endisset
                    </li>
                @endcanany
            @endforeach
        </ul>
    </div>
</aside>
