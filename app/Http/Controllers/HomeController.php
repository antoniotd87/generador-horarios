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
use Exception;

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

        $pdf = PDF::loadView('horario.pdf.por-grupo', ['grupo' => $grupo, 'dias' => $dias, 'horas' => $horas])->setPaper('a4', 'landscape');
        return $pdf->download('grupo-' . $grupo->grupo . '.pdf');
    }

    public function horarioMaestro(Maestro $maestro)
    {
        $dias = Dia::all();
        $horas = Hora::all();
        return view('horario.por-maestro', compact('maestro', 'dias', 'horas'));
    }

    public function descargarHorarioMaestro(Maestro $maestro)
    {
        $dias = Dia::all();
        $horas = Hora::all();
        $pdf = PDF::loadView('horario.pdf.por-maestro', ['maestro' => $maestro, 'dias' => $dias, 'horas' => $horas])->setPaper('letter', 'landscape');
        return $pdf->download($maestro->docente . '.pdf');
    }

    public function generador()
    {
        Horario::truncate();
        $maestros = Maestro::join('horario_disponible', 'maestros.id', '=', 'horario_disponible.maestro_id')
            ->select(['maestros.id', 'maestros.docente', DB::raw('count(*) as totalHoras, maestros.id')])
            ->groupBy('maestros.id')
            ->get();
        foreach ($maestros as $key => $mase) {
            $horasTotales = 0;
            foreach ($mase->clases as $class) {
                $horasTotales += (int)$class->materia->horas;
            }
            $maestros[$key]->restantes = $mase->totalHoras - $horasTotales;
        }

        for ($i = 0; $i < count($maestros); $i++) {
            for ($j = 0; $j < count($maestros) - 1; $j++) {
                if ($maestros[$j]->restantes > $maestros[$j + 1]->restantes) {
                    $temporal = $maestros[$j];
                    $maestros[$j] = $maestros[$j + 1];
                    $maestros[$j + 1] = $temporal;
                }
            }
        }

        $ma = $maestros->toArray();
        // dd( $maestros );
        $this->generarHorarios($ma, 3);

        // Revisar si cada maestro tiene todas sus horas
        $newMaestros = $this->revisarHorarios($maestros);
        // $newM = $this->shuffle_assoc($newMaestros);
        if (count($newMaestros) > 0) {
            $this->generarHorarios($newMaestros, 4);
            // Revisar si cada maestro tiene todas sus horas
            $newMaestros = $this->revisarHorarios($maestros);

            // $newM = $this->shuffle_assoc($newMaestros);

            $this->generarHorarios($newMaestros, 5);
            // Revisar si cada maestro tiene todas sus horas
            $newMaestros = $this->revisarHorarios($maestros);
            dd($newMaestros);
        }
        // return redirect()->route('home');
    }

    function shuffle_assoc(&$array)
    {
        $keys = array_keys($array);

        shuffle($keys);

        foreach ($keys as $key) {
            $new[$key] = $array[$key];
        }

        $array = $new;

        return $array;
    }

    public function generarHorarios($maestros, $horaLimites)
    {
        $dias = Dia::all();
        $numberDias = [0, 1, 2, 3, 4];
        shuffle($numberDias);
        $aulas = Aula::all();
        $numberAulas = [0, 1, 2, 3, 4, 5, 6];
        shuffle($numberAulas);
        $horas = Hora::all();

        foreach ($maestros as $maestro_id) {
            $maestro = Maestro::find($maestro_id['id']);
            $errores = [];
            $horasDelMaestro = $maestro->horarioDisponibles;
            $clasesDelMaestro = $maestro->clases;
            foreach ($horasDelMaestro as $horaDisponible) {
                foreach ($numberDias as $diaN) {
                    foreach ($horas as $hora) {
                        foreach ($numberAulas as $aulaN) {
                            if ($dias[$diaN]->id == $horaDisponible->dia_id && $hora->id == $horaDisponible->hora_id) {
                                foreach ($clasesDelMaestro as $clase) {
                                    $horasAsignadasDeLaMateria = $maestro->horarios()->where('materia_id', $clase->materia_id)->where('grupo_id', $clase->grupo_id)->count();
                                    $horasAsignadasDeLaMateriaPorDia = $maestro->horarios()->where('dia_id', $dias[$diaN]->id)->where('materia_id', $clase->materia_id)->count();
                                    $horasDeLaMateria = $clase->materia->horas;
                                    if ($horasAsignadasDeLaMateria < $horasDeLaMateria) {
                                        if ($horasAsignadasDeLaMateriaPorDia <= $horaLimites) {
                                            try {
                                                $maestro->horarios()->create([
                                                    'materia_id' => $clase->materia_id,
                                                    'grupo_id' => $clase->grupo_id,
                                                    'hora_id' => $hora->id,
                                                    'dia_id' => $dias[$diaN]->id,
                                                    'aula_id' => $aulas[$aulaN]->id,
                                                ]);
                                            } catch (Exception $th) {
                                                array_push($errores, $th->getMessage());
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function revisarHorarios($maestros)
    {
        $errores = [];
        $newMaestros = [];
        foreach ($maestros as $maestro) {
            // Consultar el horaio asignado y ver si el numer de horas es iguala l de la materoa
            // dd($maestro->horarios()->groupBy('materia_id', 'grupo_id')->get());
            $horas = $maestro->horarios()->groupBy('materia_id', 'grupo_id')->get();
            $falla = false;
            foreach ($maestro->clases as $clase) {
                foreach ($horas as $hora) {
                    if ($hora->grupo_id == $clase->grupo_id && $hora->materia_id == $clase->materia_id) {
                        $thoras = $maestro->horarios()->where('materia_id', $clase->materia_id)->where('grupo_id', $clase->grupo_id)->count();
                        $choras = $clase->materia->horas;
                        if (!($thoras == $choras)) {
                            $falla = true;
                            array_push($errores, "Error en horas Asig:" . $thoras . " Clase:" . $choras . " " . $clase->materia->materia . " " . $maestro->docente . " " . $clase->grupo_id);
                        }
                    }
                }
            }
            if ($falla) {
                array_push($newMaestros, $maestro);
            }
        }

        return $newMaestros;
    }

    public function generadorMaestro(Maestro $maestro)
    {
        DB::table('horarios')->where('maestro_id', $maestro->id)->delete();

        $dias = Dia::all();
        $aulas = Aula::all();
        $horas = Hora::all();
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
            }
        }
        return redirect()->route('horario.maestro', ['maestro' => $maestro->id]);
    }
}
