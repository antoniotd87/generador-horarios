<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use App\Models\Grupo;
use App\Models\Hora;
use App\Models\Maestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio()
    {
        return redirect()->route('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $grupos = Grupo::all();
        $maestros = Maestro::all();
        return view('home', compact('grupos', 'maestros'));
    }

    public function horarioGrupo(Grupo $grupo)
    {
        $dias = Dia::all();
        $horas = Hora::all();
        return view('horario.por-grupo', compact('grupo', 'dias', 'horas'));
    }

    public function horarioMaestro(Maestro $maestro)
    {
        $dias = Dia::all();
        $horas = Hora::all();
        return view('horario.por-maestro', compact('maestro', 'dias', 'horas'));
    }

    public function generador()
    {
        $maestros_id = DB::table('maestros')
            ->join('horario_disponible', 'maestros.id', '=', 'horario_disponible.maestro_id')
            ->select(['maestros.id', DB::raw('count(*) as totalHoras, maestros.id')])
            ->groupBy('maestros.id')
            ->orderBy('totalHoras', 'ASC')
            ->get();

        $dias = Dia::all();
        $horas = Hora::all();
        foreach ($maestros_id as $maestro_id) {
            $maestro = Maestro::find($maestro_id->id);
            $horasDelMaestro = $maestro->horarioDisponibles;
            $clasesDelMaestro = $maestro->clases;
            foreach ($dias as $dia) {
                foreach ($horas as $hora) {
                    foreach ($horasDelMaestro as $horaDisponible) {
                        if ($dia->id == $horaDisponible->dia_id && $hora->id == $horaDisponible->hora_id) {
                            echo 'Hora Disponible ';
                            echo $dia->dia;
                            echo $hora->hora;
                            echo '<br>';
                            echo '<br>';
                            foreach ($clasesDelMaestro as $clase) {
                                $maestro->horarios()->create(['clase_id'=>$clase->id]);
                            }
                        }
                    }
                }
            }
        }
        return;
        return redirect()->route('home');
    }
}
