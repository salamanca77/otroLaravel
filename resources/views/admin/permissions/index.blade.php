<x-admin-layout>
    <x-slot name="action">
        <a class="btn btn-primary" href="{{ route('admin.permissions.create') }}">
            Nuevo
        </a>
    </x-slot>

    @livewire('permission-table')

</x-admin-layout>
