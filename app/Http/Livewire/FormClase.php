<?php

namespace App\Http\Livewire;

use App\Models\Semestre;
use Livewire\Component;

class FormClase extends Component
{
    public $clase;

    public $semestres, $grupos, $materias, $semestreSeleccionado = null;
    public function mount()
    {
        if ($this->clase->id) {
            $this->semestreSeleccionado = $this->clase->grupo->semestre->id;
        }
    }
    public function render()
    {
        $this->semestres = Semestre::all();
        // dd($this->clase->grupo->semestre);
        if ($this->semestreSeleccionado) {
            $this->grupos = Semestre::find((int)$this->semestreSeleccionado)->grupos;
        } else if ($this->clase->id) {
            $this->grupos = Semestre::find($this->clase->grupo->semestre->id)->grupos;
        } else {
            $this->grupos = [];
        }

        if ($this->semestreSeleccionado) {
            $this->materias = Semestre::find((int)$this->semestreSeleccionado)->materias;
        } else if ($this->clase->id) {
            $this->materias = Semestre::find($this->clase->grupo->semestre->id)->materias;
        } else {
            $this->materias = [];
        }

        return view('maestro.clase.form-clase');
    }
}
