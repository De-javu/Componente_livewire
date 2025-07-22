<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Formulario;
use Livewire\WithPagination;

class FormulariosList extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $formularios = Formulario::with('user')
            ->when($this->search, function ($query) {
                $query->where('nombre', 'like', '%' . $this->search . '%')
                      ->orWhere('apellido', 'like', '%' . $this->search . '%')
                      ->orWhere('cedula', 'like', '%' . $this->search . '%')
                      ->orWhere('ciudad', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.formulario-list', [
            'formularios' => $formularios
        ]);
    }
}
