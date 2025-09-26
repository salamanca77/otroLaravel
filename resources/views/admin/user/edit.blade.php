<x-admin-layout>
    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="p-4">
        @csrf
        @method('PUT')
        <x-validation-errors class="mb-4" />
        <div class="mb-4">
            <x-label class="mb-1">
                Nombre
            </x-label>
            <x-input name="name" class="w-full" required value="{{ old('name', $user->name) }}" />
        </div>
        <div class="mb-4">
            <x-label class="mb-1">
                Email
            </x-label>
            <x-input type="email" name="email" class="w-full" required value="{{ old('email', $user->email) }}" />
        </div>
        <div class="mb-4">
            <x-label class="mb-1">
                Contraseña
            </x-label>
            <x-input type="password" name="password" class="w-full" />
        </div>
        <div class="mb-4">
            <x-label class="mb-1">
                Confirmar Contraseña
            </x-label>
            <x-input type="password" name="password_confirmation" class="w-full" />
        </div>
        <div class="flex justify-end">
            <x-button>
                Actualizar
            </x-button>
        </div>

    </form>

</x-admin-layout>
