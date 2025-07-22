
<div>
    @if (session()->has('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-6">
        <div>
            <flux:heading size="lg">Update profile</flux:heading>
            <flux:text class="mt-2">Make changes to your personal details.</flux:text>
        </div>
        <flux:input label="Cedula" placeholder="Your cedula" wire:model="cedula" />
        <flux:input label="Nombre" placeholder="Your name" wire:model="nombre" />
        <flux:input label="Apellido" placeholder="Your apellido" wire:model="apellido" />
        <flux:select label="Ciudad" wire:model="ciudad">
            <option value="">Selecciona una ciudad</option>
            @foreach($ciudades as $ciudad)
                <option value="{{ $ciudad }}">{{ $ciudad }}</option>
            @endforeach
        </flux:select>
        <flux:input label="Celular" placeholder="Your celular" wire:model="celular" />
        <flux:input label="Fecha de inicio" type="date" wire:model="fecha_inicial" />
        <flux:input label="Fecha final" type="date" wire:model="fecha_final" />
        <div class="flex">
            <flux:spacer />
            <flux:button type="submit" variant="primary">Save changes</flux:button>
        </div>
    </form>
</div>
