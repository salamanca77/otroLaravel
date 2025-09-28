<x-admin-layout>
    <form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>

                <x-input name="name" value="{{ old('name', $permission->name) }}" class="w-full" />

            </div>

            <div class="flex justify-end space-x-2">

                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>

                <x-button>
                    Actualizar
                </x-button>
            </div>
        </div>
    </form>

    <form id="delete-user-form" action="{{ route('admin.permissions.destroy', $permission) }}" method="POST">
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
