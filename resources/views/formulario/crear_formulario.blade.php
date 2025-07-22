<x-layouts.app :title="__('Crear Formulario')">
    <flux:modal.trigger name="edit-profile">
        <flux:button>CREAR</flux:button>
    </flux:modal.trigger>

    <flux:modal name="edit-profile" class="md:w-96">
        @livewire('formulario-livewire')
    </flux:modal>


    <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @livewire('formularios-list')
            </div>
        </div>
</x-layouts.app>


