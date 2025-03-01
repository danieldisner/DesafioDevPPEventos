<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800">
            Editar Evento
        </h2>
    </x-slot>

    <div class="py-12 pt-1">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-full max-w-4xl p-6 bg-white rounded-lg shadow-lg">
                <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block font-medium text-gray-700">Tipo</label>
                        <select name="type"
                            class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="social" {{ $event->type == 'social' ? 'selected' : '' }}>Social</option>
                            <option value="cultural" {{ $event->type == 'cultural' ? 'selected' : '' }}>Cultural
                            </option>
                            <option value="esportivo" {{ $event->type == 'esportivo' ? 'selected' : '' }}>Esportivo
                            </option>
                            <option value="corporativo" {{ $event->type == 'corporativo' ? 'selected' : '' }}>
                                Corporativo</option>
                            <option value="religioso" {{ $event->type == 'religioso' ? 'selected' : '' }}>Religioso
                            </option>
                            <option value="entretenimento" {{ $event->type == 'entretenimento' ? 'selected' : '' }}>
                                Entretenimento</option>
                            <option value="outros" {{ $event->type == 'outros' ? 'selected' : '' }}>Outros</option>
                        </select>
                    </div>

                    <!-- Nome -->
                    <div>
                        <label class="block font-medium text-gray-700">Nome</label>
                        <input type="text" name="name"
                            class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            value="{{ old('name', $event->name) }}" required>
                    </div>

                    <!-- Descrição -->
                    <div>
                        <label class="block font-medium text-gray-700">Descrição</label>
                        <textarea name="description"
                            class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            rows="4" required>{{ old('description', $event->description) }}</textarea>
                    </div>

                    <!-- Endereço -->
                    <div>
                        <label class="block font-medium text-gray-700">Endereço</label>
                        <input type="text" name="address"
                            class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            value="{{ old('address', $event->address) }}" required>
                    </div>

                    <!-- Link do Google Maps -->
                    <div>
                        <label class="block font-medium text-gray-700">Link do Google Maps</label>
                        <input type="url" name="address_link"
                            class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            value="{{ old('address_link', $event->address_link) }}">
                    </div>

                    <!-- Data e Hora -->
                    <div>
                        <label class="block font-medium text-gray-700">Data e Hora</label>
                        <input type="datetime-local" name="start_time"
                            class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            value="{{ old('start_time', \Carbon\Carbon::parse($event->start_time)->format('Y-m-d\TH:i')) }}"
                            required>
                    </div>

                    <!-- Preço -->
                    <div>
                        <label class="block font-medium text-gray-700">Preço</label>
                        <input type="number" step="0.01" name="price"
                            class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            value="{{ old('price', $event->price) }}">
                    </div>

                    <!-- Botão de Submit -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-gray-800 rounded shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
                            Atualizar Evento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
