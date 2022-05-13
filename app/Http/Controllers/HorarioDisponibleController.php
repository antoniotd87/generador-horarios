<?php

namespace App\Http\Controllers;

use App\Models\HorarioDisponible;
use Illuminate\Http\Request;

/**
 * Class HorarioDisponibleController
 * @package App\Http\Controllers
 */
class HorarioDisponibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarioDisponibles = HorarioDisponible::paginate();

        return view('horario-disponible.index', compact('horarioDisponibles'))
            ->with('i', (request()->input('page', 1) - 1) * $horarioDisponibles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horarioDisponible = new HorarioDisponible();
        return view('horario-disponible.create', compact('horarioDisponible'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(HorarioDisponible::$rules);

        $horarioDisponible = HorarioDisponible::create($request->all());

        return redirect()->route('horario-disponibles.index')
            ->with('success', 'HorarioDisponible created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horarioDisponible = HorarioDisponible::find($id);

        return view('horario-disponible.show', compact('horarioDisponible'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horarioDisponible = HorarioDisponible::find($id);

        return view('horario-disponible.edit', compact('horarioDisponible'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  HorarioDisponible $horarioDisponible
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HorarioDisponible $horarioDisponible)
    {
        request()->validate(HorarioDisponible::$rules);

        $horarioDisponible->update($request->all());

        return redirect()->route('horario-disponibles.index')
            ->with('success', 'HorarioDisponible updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $horarioDisponible = HorarioDisponible::find($id)->delete();

        return redirect()->route('horario-disponibles.index')
            ->with('success', 'HorarioDisponible deleted successfully');
    }
}
