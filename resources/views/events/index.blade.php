<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Eventos') }}
        </h2>
    </x-slot>

    <div class="py-12 pt-1">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-between mt-2 mb-6">
                <a href="{{ route('events.create') }}"
                    class="px-4 py-4 text-white bg-gray-800 rounded shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
                    <span class="font-semibold">Cadastrar Evento</span>
                </a>
                <button id="toggle-filters"
                    class="px-4 py-4 text-white bg-blue-500 rounded shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Filtros
                </button>
            </div>

            <!-- Formulário de Filtro -->
            <div id="filters" class="hidden mb-4">
                <form method="GET" action="{{ route('events.index') }}">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- Filtro de Tipo -->
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                            <select name="type" id="type"
                                class="w-full p-2 mt-1 border border-gray-300 rounded-lg">
                                <option value="">Selecione o Tipo</option>
                                <option value="social" {{ request('type') == 'social' ? 'selected' : '' }}>Social
                                </option>
                                <option value="cultural" {{ request('type') == 'cultural' ? 'selected' : '' }}>Cultural
                                </option>
                                <option value="esportivo" {{ request('type') == 'esportivo' ? 'selected' : '' }}>
                                    Esportivo</option>
                                <option value="corporativo" {{ request('type') == 'corporativo' ? 'selected' : '' }}>
                                    Corporativo</option>
                                <option value="religioso" {{ request('type') == 'religioso' ? 'selected' : '' }}>
                                    Religioso</option>
                                <option value="entretenimento"
                                    {{ request('type') == 'entretenimento' ? 'selected' : '' }}>Entretenimento</option>
                                <option value="outros" {{ request('type') == 'outros' ? 'selected' : '' }}>Outros
                                </option>
                            </select>
                        </div>

                        <!-- Filtro de Nome -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                            <input type="text" name="name" id="name"
                                class="w-full p-2 mt-1 border border-gray-300 rounded-lg" value="{{ request('name') }}"
                                placeholder="Buscar por nome">
                        </div>

                        <!-- Filtro de Endereço -->
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Endereço</label>
                            <input type="text" name="address" id="address"
                                class="w-full p-2 mt-1 border border-gray-300 rounded-lg"
                                value="{{ request('address') }}" placeholder="Buscar por endereço">
                        </div>

                        <!-- Filtro de Data -->
                        <div>
                            <label for="start_date_from" class="block text-sm font-medium text-gray-700">Data
                                (de)</label>
                            <input type="date" name="start_date_from" id="start_date_from"
                                class="w-full p-2 mt-1 border border-gray-300 rounded-lg"
                                value="{{ request('start_date_from') }}">
                        </div>
                        <div>
                            <label for="start_date_to" class="block text-sm font-medium text-gray-700">Data
                                (até)</label>
                            <input type="date" name="start_date_to" id="start_date_to"
                                class="w-full p-2 mt-1 border border-gray-300 rounded-lg"
                                value="{{ request('start_date_to') }}">
                        </div>

                        <!-- Filtro de Preço -->
                        <div>
                            <label for="price_from" class="block text-sm font-medium text-gray-700">Preço (de)</label>
                            <input type="number" step="0.01" name="price_from" id="price_from"
                                class="w-full p-2 mt-1 border border-gray-300 rounded-lg"
                                value="{{ request('price_from') }}" placeholder="Preço mínimo">
                        </div>
                        <div>
                            <label for="price_to" class="block text-sm font-medium text-gray-700">Preço (até)</label>
                            <input type="number" step="0.01" name="price_to" id="price_to"
                                class="w-full p-2 mt-1 border border-gray-300 rounded-lg"
                                value="{{ request('price_to') }}" placeholder="Preço máximo">
                        </div>

                        <!-- Botão de Submissão -->
                        <div class="flex justify-end mt-2 sm:col-span-2 lg:col-span-3">
                            <button type="submit"
                                class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none">
                                Filtrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="w-full overflow-hidden bg-white shadow-lg sm:rounded-lg">
                <div class="w-full p-4 text-gray-900 bg-white">
                    @if ($events->isEmpty())
                        <div class="py-8 text-center text-gray-500">
                            <p class="text-xl">Ainda não há eventos cadastrados.</p>
                        </div>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Tipo
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Nome
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                                        Descrição
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Endereço
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Data de
                                        Início</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Preço
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($events as $event)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $event->type }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $event->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $event->description }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $event->address }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($event->start_time)->format('d/m/Y H:i') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ number_format($event->price, 2, ',', '.') }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('events.edit', $event->id) }}" class="px-4 py-2">
                                                <span class="text-sm font-semibold">Editar</span>
                                            </a>

                                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                                class="inline"
                                                onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2">
                                                    <span class="text-sm font-semibold">Excluir</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Exibição de Quantidade de Registros -->
                        <div class="mt-4">
                            <p class="text-sm text-gray-600">
                                Mostrando {{ $events->count() }} de {{ $events->total() }} registros
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // Script para alternar a visibilidade dos filtros
    document.getElementById('toggle-filters').addEventListener('click', function() {
        const filters = document.getElementById('filters');
        filters.classList.toggle('hidden');
    });
</script>
