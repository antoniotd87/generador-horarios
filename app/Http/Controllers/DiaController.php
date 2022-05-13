<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use Illuminate\Http\Request;

/**
 * Class DiaController
 * @package App\Http\Controllers
 */
class DiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dias = Dia::paginate();

        return view('dia.index', compact('dias'))
            ->with('i', (request()->input('page', 1) - 1) * $dias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dia = new Dia();
        return view('dia.create', compact('dia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Dia::$rules);

        $dia = Dia::create($request->all());

        return redirect()->route('dias.index')
            ->with('success', 'Dia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dia = Dia::find($id);

        return view('dia.show', compact('dia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dia = Dia::find($id);

        return view('dia.edit', compact('dia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dia $dia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dia $dia)
    {
        request()->validate(Dia::$rules);

        $dia->update($request->all());

        return redirect()->route('dias.index')
            ->with('success', 'Dia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dia = Dia::find($id)->delete();

        return redirect()->route('dias.index')
            ->with('success', 'Dia deleted successfully');
    }
}
