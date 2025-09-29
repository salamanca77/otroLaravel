<x-controlVehicular-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8'">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <form action="" method="POST">
                @csrf
                <h2 class="text-2xl uppercase text-center mb-4">
                    Crear curso
                </h2>
                <x-validation-errors class="mb-4" />

                <x-label class="mt-1">
                    Nombre del curso
                </x-label>

                <div class="mt-4">
                    <x-input name="title" placeholder="Introducir nombre" class="w-full" value="{{ old('title') }}"
                        oninput="string_to_slug(this.value,'#slug')" />
                </div>

                <x-label class="mt-1">
                    Slug
                </x-label>

                <div class="mt-4">
                    <x-input id="slug" name="slug" placeholder="Introducir nombre" class="w-full"
                        value="" />
                </div>

                <div class="flex justify-end">
                    <x-button>
                        Crear curso
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-controlVehicular-layout>
