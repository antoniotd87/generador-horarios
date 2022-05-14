<?php

namespace App\Http\Livewire;

use App\Models\Dia;
use App\Models\Hora;
use Livewire\Component;

class HorarioDisponible extends Component
{
    public $maestro;
    public $horarioDisponibles;
    public $dias, $horas;


    public function render()
    {
        $this->horarioDisponibles = $this->maestro->horarioDisponibles;
        $this->dias = Dia::all();
        $this->horas = Hora::all();
        return view('maestro.horario-disponible.horario-disponible');
    }
    public function cambiarDisponibilidad(Dia $dia, Hora $hora)
    {
        $data = $this->maestro->horarioDisponibles()->where('hora_id', $hora->id)->where('dia_id', $dia->id)->first();
        if ($data == null) {
            $this->maestro->horarioDisponibles()->create([
                'hora_id' => $hora->id,
                'dia_id' => $dia->id,
            ]);
        } else {
            $this->maestro->horarioDisponibles()->where('hora_id', $hora->id)->where('dia_id', $dia->id)->delete();
        }
        $this->resetData();
        session()->flash('message', 'Por favor espere...');
    }
    public function resetData()
    {
        $this->dias = Dia::all();
        $this->horas = Hora::all();
        $this->horarioDisponibles = $this->maestro->horarioDisponibles;
    }
}
