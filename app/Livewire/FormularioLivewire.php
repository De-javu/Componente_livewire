<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Formulario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

// Se crea el componente Livewire para manejar el formulario
class FormularioLivewire extends Component
{
    public $cedula = '';
    public $nombre = '';
    public $apellido = '';
    public $ciudad = '';
    public $celular = '';
    public $fecha_inicial = '';
    public $fecha_final = '';
    public $ciudades = [];

    // Reglas de validación para el formulario
    protected $rules = [
        'cedula' => 'required|string|max:255',
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'ciudad' => 'required|string',
        'celular' => 'required|string|max:255',
        'fecha_inicial' => 'required|date',
        'fecha_final' => 'required|date',
    ];
     // Mensajes personalizados de validación
    protected $messages = [
        'cedula.required' => 'La cédula es obligatoria.',
        'nombre.required' => 'El nombre es obligatorio.',
        'apellido.required' => 'El apellido es obligatorio.',
        'ciudad.required' => 'La ciudad es obligatoria.',
        'celular.required' => 'El celular es obligatorio.',
        'fecha_inicial.required' => 'La fecha inicial es obligatoria.',
        'fecha_final.required' => 'La fecha final es obligatoria.',
    ];
// Mensajes personalizados de validación
    public function mount()
    {
        // Obtener las ciudades del enum de la base de datos
        $this->ciudades = $this->getCityOptions();
    }

 // Método para obtener las opciones de ciudad desde el enum
    private function getCityOptions()
    {
        try {
            $enumStr = DB::select("SHOW COLUMNS FROM formularios WHERE Field = 'ciudad'")[0]->Type;
            preg_match('/^enum\((.*)\)$/', $enumStr, $matches);
            $vals = [];
            foreach(explode(',', $matches[1]) as $val) {
                $vals[] = trim($val, "'");
            }
            return $vals;
        } catch (\Exception $e) {
            // Si hay un error, devolver ciudades por defecto
            return ['Bogotá', 'Medellín', 'Cali', 'Barranquilla', 'Cartagena'];
        }
    }

 // Método para manejar el envío del formulario
    public function submit()
    {
        // Validar los datos del formulario
        $this->validate();

        Formulario::create([
            'user_id' => Auth::id(), // Usuario autenticado
            'cedula' => $this->cedula,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'ciudad' => $this->ciudad,
            'celular' => $this->celular,
            'fecha_inicial' => $this->fecha_inicial,
            'fecha_final' => $this->fecha_final,
        ]);

        session()->flash('success', 'Formulario enviado correctamente.');
        $this->reset(['cedula', 'nombre', 'apellido', 'ciudad', 'celular', 'fecha_inicial', 'fecha_final']);

        // Cerrar el modal después de enviar
        $this->dispatch('close-modal', 'edit-profile');
    }


    // Método para renderizar la vista del componente
    public function render()
    {
        return view('livewire.formulario-livewire', [
            'ciudades' => $this->ciudades
        ]);
    }
}
