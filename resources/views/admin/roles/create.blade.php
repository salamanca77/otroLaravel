<x-admin-layout>
    <form method="POST" action="{{ route('admin.roles.store') }}">
        @csrf

        <div class="card">
            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>

                <x-input name="name" value="{{ old('name') }}" class="w-full" />

            </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Permisos
                </x-label>

                <ul>
                    @foreach ($permissions as $permission)
                        <li>
                            <label>
                                <x-checkbox name="permissions[]" value="{{ $permission->id }}" :checked="in_array($permission->id, old('permission', []))" />
                                {{ $permission->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>


            <div class="flex justify-end">
                <x-button class="mb-4">
                    Guardar
                </x-button>
            </div>
        </div>
    </form>
</x-admin-layout>
