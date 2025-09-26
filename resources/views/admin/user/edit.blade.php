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

        <div class="mb-4">
            <x-label class="mb-1">
                Roles
            </x-label>

            <ul>
                @foreach ($roles as $role)
                    <li>
                        <label>
                            <x-checkbox name="roles[]" value="{{ $role->id }}" :checked="in_array($role->id, old('roles', $user->roles->pluck('id')->toArray()))" />
                            {{ $role->name }}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>


        <div class="flex justify-end space-x-2">
            <x-danger-button onclick="confirmDelete()">
                Eliminar
            </x-danger-button>

            <x-button>
                Actualizar
            </x-button>
        </div>

    </form>

    <form id="delete-user-form" action="{{ route('admin.users.destroy', $user) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function confirmDelete() {
                Swal.fire({
                    title: "Esta seguro?",
                    text: "No podra revertirse!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Borralo!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    document.getElementById('delete-user-form').submit();
                });
            }
        </script>
    @endpush

</x-admin-layout>
