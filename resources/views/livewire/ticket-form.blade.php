<div class="max-w-4xl mx-auto mt-20 px-4 sm:px-6 lg:px-8">

    {{-- Mensaje de éxito temporal --}}
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            {{ session('message') }}
        </div>
    @endif

    {{-- Sección para configurar la tarifa --}}
    <div class="mb-6 p-4 border rounded-lg bg-gray-50 dark:bg-gray-800">
        <h3 class="text-lg font-semibold border-b pb-2 mb-4">Configuración de Tarifa</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Tarifa</label>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <input wire:model.defer="tipo_tarifa" type="radio" value="minuto" id="tipo_minuto"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="tipo_minuto" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Por
                            Minuto</label>
                    </div>
                    <div class="flex items-center">
                        <input wire:model.defer="tipo_tarifa" type="radio" value="hora" id="tipo_hora"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="tipo_hora" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Por
                            Hora</label>
                    </div>
                </div>
            </div>
            <div>
                <label for="tarifa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Tarifa por {{ ucfirst($tipo_tarifa) }}
                </label>
                <input type="text" inputmode="decimal" id="tarifa" wire:model.defer="tarifa"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                 @error('tarifa')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                 @enderror
            </div>
            <div>
                <button type="button" wire:click="guardarTarifa"
                    class="px-6 py-2.5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium w-full">
                    Guardar Tarifa
                </button>
            </div>
        </div>
    </div>
</div>