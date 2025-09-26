<x-admin-layout>
    <x-slot name="action">
        <a class="btn btn-primary" href="{{ route('admin.users.create') }}">
            Nuevo usuario
        </a>
    </x-slot>
    <div>
        @livewire('user-table')

    </div>
</x-admin-layout>
