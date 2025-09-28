<x-admin-layout>
    <form method="POST" action="{{ route('admin.permissions.store') }}">
        @csrf

        <div class="card">
            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>

                <x-input name="name" value="{{ old('name') }}" class="w-full" />

            </div>

            <div class="flex justify-end">
                <x-button class="mb-4">
                    Guardar
                </x-button>
            </div>
        </div>
    </form>
</x-admin-layout>
