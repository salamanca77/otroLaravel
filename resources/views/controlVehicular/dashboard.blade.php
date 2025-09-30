<x-controlVehicular-layout>
    <div class="max-w-4xl mx-auto mt-20 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-6">

            {{-- Mostrar mensajes --}}
            @if (session('success'))
                <div id="alert-success"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-opacity duration-500">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div id="alert-error"
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 transition-opacity duration-500">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('controlVehicular.ticket.entrada_store') }}" method="POST">
                @csrf

                <h2 class="text-2xl uppercase text-center mb-2">
                    Ticket
                </h2>

                <h3 class="text-2xl uppercase text-center mb-4">
                    Entrada
                </h3>

                <x-validation-errors class="mb-4" />

                <x-label class="mt-1">
                    Nombre
                </x-label>

                <div class="mt-4">
                    <x-input name="nombre" placeholder="Introducir nombre" class="w-full" value="{{ old('nombre') }}"
                        oninput="string_to_slug(this.value,'#slug')" />
                </div>

                <x-label class="mt-1">
                    Placa
                </x-label>

                <div class="mt-4">
                    <x-input id="placa" name="placa" placeholder="Introducir placa" class="w-full"
                        value="{{ old('placa') }}" />
                </div>

                <div class="mt-4">
                    <x-input id="entrada" type="hidden" name="entrada" class="w-full" value="entrada" />
                </div>

                <div class="flex justify-end mt-4">
                    <x-button>
                        Aceptar
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Auto-ocultar mensajes después de 3 segundos
                const alerts = ['alert-success', 'alert-error'];

                alerts.forEach(alertId => {
                    const alert = document.getElementById(alertId);
                    if (alert) {
                        setTimeout(() => {
                            alert.style.opacity = '0';
                            setTimeout(() => alert.remove(), 5000);
                        }, 3000);
                    }
                });

                // Ocultar mensajes al escribir en el campo placa
                const placaInput = document.getElementById('placa');
                if (placaInput) {
                    placaInput.addEventListener('input', function() {
                        alerts.forEach(alertId => {
                            const alert = document.getElementById(alertId);
                            if (alert) {
                                alert.style.opacity = '0';
                                setTimeout(() => alert.remove(), 5000);
                            }
                        });
                    });
                }
            });
        </script>
    @endpush

</x-controlVehicular-layout>
