<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Dia;
use App\Models\Grupo;
use App\Models\Hora;
use App\Models\Horario;
use App\Models\Maestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

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

    public function descargarHorarioGrupo(Grupo $grupo)
    {
        $dias = Dia::all();
        $horas = Hora::all();

        $pdf = PDF::loadView('horario.pdf.por-grupo', ['grupo'=>$grupo,'dias'=>$dias,'horas'=>$horas])->setPaper('a4', 'landscape');
        return $pdf->download('invoice.pdf');
    }

    public function horarioMaestro(Maestro $maestro)
    {
        $dias = Dia::all();
        $horas = Hora::all();
        return view('horario.por-maestro', compact('maestro', 'dias', 'horas'));
    }

    public function generador()
    {
        Horario::truncate();
        $maestros_id = DB::table('maestros')
            ->join('horario_disponible', 'maestros.id', '=', 'horario_disponible.maestro_id')
            ->select(['maestros.id', DB::raw('count(*) as totalHoras, maestros.id')])
            ->groupBy('maestros.id')
            ->orderBy('totalHoras', 'ASC')
            ->get();

        $dias = Dia::all();
        $aulas = Aula::all();
        $horas = Hora::all();
        foreach ($maestros_id as $maestro_id) {
            $maestro = Maestro::find($maestro_id->id);
            $horasDelMaestro = $maestro->horarioDisponibles;
            $clasesDelMaestro = $maestro->clases;
            foreach ($horasDelMaestro as $horaDisponible) {
                foreach ($dias as $dia) {
                    foreach ($horas as $hora) {
                        foreach ($aulas as $aula) {
                            if ($dia->id == $horaDisponible->dia_id && $hora->id == $horaDisponible->hora_id) {
                                foreach ($clasesDelMaestro as $clase) {
                                    $horasAsignadasDeLaMateria = $maestro->horarios()->where('materia_id', $clase->materia_id)->where('grupo_id', $clase->grupo_id)->count();
                                    $horasAsignadasDeLaMateriaPorDia = $maestro->horarios()->where('dia_id', $dia->id)->where('materia_id', $clase->materia_id)->count();
                                    $horasDeLaMateria = $clase->materia->horas;
                                    if ($horasAsignadasDeLaMateria < $horasDeLaMateria) {
                                        if ($horasAsignadasDeLaMateriaPorDia < 3) {
                                            try {
                                                $maestro->horarios()->create([
                                                    'materia_id' => $clase->materia_id,
                                                    'grupo_id' => $clase->grupo_id,
                                                    'hora_id' => $hora->id,
                                                    'dia_id' => $dia->id,
                                                    'aula_id' => $aula->id,
                                                ]);
                                            } catch (\Throwable $th) {
                                                //print_r($th->getMessage());
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    //return;
                }
            }
        }
        return;
        return redirect()->route('home');
    }
}
