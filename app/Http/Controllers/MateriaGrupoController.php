<?php

namespace App\Http\Controllers;

use App\Models\MateriaGrupo;
use Illuminate\Http\Request;

/**
 * Class MateriaGrupoController
 * @package App\Http\Controllers
 */
class MateriaGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiaGrupos = MateriaGrupo::paginate();

        return view('materia-grupo.index', compact('materiaGrupos'))
            ->with('i', (request()->input('page', 1) - 1) * $materiaGrupos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiaGrupo = new MateriaGrupo();
        return view('materia-grupo.create', compact('materiaGrupo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MateriaGrupo::$rules);

        $materiaGrupo = MateriaGrupo::create($request->all());

        return redirect()->route('materia-grupos.index')
            ->with('success', 'MateriaGrupo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materiaGrupo = MateriaGrupo::find($id);

        return view('materia-grupo.show', compact('materiaGrupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materiaGrupo = MateriaGrupo::find($id);

        return view('materia-grupo.edit', compact('materiaGrupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MateriaGrupo $materiaGrupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MateriaGrupo $materiaGrupo)
    {
        request()->validate(MateriaGrupo::$rules);

        $materiaGrupo->update($request->all());

        return redirect()->route('materia-grupos.index')
            ->with('success', 'MateriaGrupo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $materiaGrupo = MateriaGrupo::find($id)->delete();

        return redirect()->route('materia-grupos.index')
            ->with('success', 'MateriaGrupo deleted successfully');
    }
}
