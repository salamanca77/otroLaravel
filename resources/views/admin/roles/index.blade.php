<x-admin-layout>
    <x-slot name="action">
        <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">
            Nuevo usuario
        </a>
    </x-slot>

    @livewire('role-table')
</x-admin-layout>
