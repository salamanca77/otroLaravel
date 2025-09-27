<x-admin-layout>
    <div class="card">
        <form action="{{ route('admin.users.store') }}" method="POST" class="p-4">
            @csrf
            <x-validation-errors class="mb-4" />
            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>
                <x-input name="name" class="w-full" required value="{{ old('name') }}" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Email
                </x-label>
                <x-input type="email" name="email" class="w-full" required value="{{ old('name') }}" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Contraseña
                </x-label>
                <x-input type="password" name="password" class="w-full" required />
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Confirmar Contraseña
                </x-label>
                <x-input type="password" name="password_confirmation" class="w-full" required />
            </div>

            {{-- Roles --}}
            <div class="mb-4">
                <x-label class="mb-1">
                    Roles
                </x-label>

                <ul>
                    @foreach ($roles as $role)
                        <li>
                            <label>
                                <x-checkbox name="roles[]" value="{{ $role->id }}" :checked="in_array($role->id, old('role', []))" />
                                {{ $role->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>

        </form>
    </div>
</x-admin-layout>
