<div class="space-y-6">
    <!-- Header con búsqueda -->
    <div class="flex justify-between items-center">
        <flux:heading size="xl">📋 Lista de Formularios</flux:heading>
        <div class="w-64">
            <flux:input
                wire:model.live="search"
                placeholder="🔍 Buscar por nombre, cédula, ciudad..."
                class="w-full"
            />
        </div>
    </div>

    <!-- Tabla de formularios -->
    @if($formularios->count() > 0)
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            👤 Usuario
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            🆔 Cédula
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            📝 Nombre Completo
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            🏙️ Ciudad
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            📱 Celular
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            📅 Fechas
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ⏰ Creado
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($formularios as $formulario)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $formulario->user->name ?? 'N/A' }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $formulario->user->email ?? 'N/A' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $formulario->cedula }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $formulario->nombre }} {{ $formulario->apellido }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $formulario->ciudad }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $formulario->celular }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div>📅 {{ \Carbon\Carbon::parse($formulario->fecha_inicial)->format('d/m/Y') }}</div>
                                <div>📅 {{ \Carbon\Carbon::parse($formulario->fecha_final)->format('d/m/Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $formulario->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $formularios->links() }}
        </div>
    @else
        <!-- Estado vacío -->
        <div class="text-center py-12">
            <div class="text-6xl mb-4">📋</div>
            <flux:heading size="lg" class="text-gray-500">No hay formularios</flux:heading>
            <flux:text class="text-gray-400 mt-2">
                @if($search)
                    No se encontraron formularios que coincidan con "{{ $search }}"
                @else
                    Aún no se han creado formularios
                @endif
            </flux:text>
        </div>
    @endif
</div>
