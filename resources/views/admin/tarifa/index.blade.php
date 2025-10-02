<x-admin-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-6">Configuración de Tarifa</h1>

        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <p class="text-gray-600 dark:text-gray-300 mb-4">
                Aquí puedes establecer la tarifa que se usará para calcular el costo de la estancia de los vehículos. 
                La tarifa se guardará y se usará para todos los cálculos futuros hasta que se vuelva a modificar.
            </p>
            
            {{-- 
                Reutilizamos el componente de Livewire que ya tiene la lógica para la tarifa.
                Aunque muestra todo el formulario, la sección de "Configuración de Tarifa" es independiente
                y su botón "Guardar Tarifa" funciona por sí solo.
            --}}
            @livewire('ticket-form')
        </div>
    </div>
</x-admin-layout>
