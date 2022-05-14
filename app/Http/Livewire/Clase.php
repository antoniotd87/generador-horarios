<?php

namespace App\Http\Livewire;

use App\Models\Clase as ModelsClase;
use Livewire\Component;
use Livewire\WithPagination;

class Clase extends Component
{
    use WithPagination;

    public $maestro;

    protected $paginationTheme = 'bootstrap';
    public $materia_id, $grupo_id;
    public $updateMode = false;

    public function render()
    {
        return view('maestro.clase.view', [
            'clases' => $this->maestro->clases()->latest()
                ->paginate(10),
        ]);
    }

    public function destroy($id)
    {
        if ($id) {
            $record = ModelsClase::where('id', $id);
            $record->delete();
        }
    }
}
