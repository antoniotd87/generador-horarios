<?php

namespace App\Http\Controllers;

use App\Models\Hora;
use Illuminate\Http\Request;

/**
 * Class HoraController
 * @package App\Http\Controllers
 */
class HoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horas = Hora::paginate();

        return view('hora.index', compact('horas'))
            ->with('i', (request()->input('page', 1) - 1) * $horas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hora = new Hora();
        return view('hora.create', compact('hora'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Hora::$rules);

        $hora = Hora::create($request->all());

        return redirect()->route('horas.index')
            ->with('success', 'Hora created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hora = Hora::find($id);

        return view('hora.show', compact('hora'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hora = Hora::find($id);

        return view('hora.edit', compact('hora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Hora $hora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hora $hora)
    {
        request()->validate(Hora::$rules);

        $hora->update($request->all());

        return redirect()->route('horas.index')
            ->with('success', 'Hora updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $hora = Hora::find($id)->delete();

        return redirect()->route('horas.index')
            ->with('success', 'Hora deleted successfully');
    }
}
