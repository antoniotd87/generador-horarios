<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

/**
 * Class AulaController
 * @package App\Http\Controllers
 */
class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aulas = Aula::paginate();

        return view('aula.index', compact('aulas'))
            ->with('i', (request()->input('page', 1) - 1) * $aulas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aula = new Aula();
        return view('aula.create', compact('aula'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Aula::$rules);

        $aula = Aula::create($request->all());

        return redirect()->route('aulas.index')
            ->with('success', 'Aula created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aula = Aula::find($id);

        return view('aula.show', compact('aula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aula = Aula::find($id);

        return view('aula.edit', compact('aula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Aula $aula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aula $aula)
    {
        request()->validate(Aula::$rules);

        $aula->update($request->all());

        return redirect()->route('aulas.index')
            ->with('success', 'Aula updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $aula = Aula::find($id)->delete();

        return redirect()->route('aulas.index')
            ->with('success', 'Aula deleted successfully');
    }
}
