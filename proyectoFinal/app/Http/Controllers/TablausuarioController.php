<?php

namespace App\Http\Controllers;

use App\Models\Tablausuario;
use Illuminate\Http\Request;
use App\Models\Tablageneral;

/**
 * Class TablausuarioController
 * @package App\Http\Controllers
 */
class TablausuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tablausuarios = Tablausuario::paginate();

        return view('tablausuario.index', compact('tablausuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $tablausuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tablausuario = new Tablausuario();
        $tablageneral = Tablageneral::pluck('id','id');
        return view('tablausuario.create', compact('tablausuario', 'tablageneral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tablausuario::$rules);

        $tablausuario = Tablausuario::create($request->all());

        return redirect()->route('tablausuarios.index')
            ->with('success', 'Tablausuario created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tablausuario = Tablausuario::find($id);

        return view('tablausuario.show', compact('tablausuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tablausuario = Tablausuario::find($id);
        $tablageneral = Tablageneral::pluck('id','id');
        return view('tablausuario.create', compact('tablausuario', 'tablageneral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tablausuario $tablausuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tablausuario $tablausuario)
    {
        request()->validate(Tablausuario::$rules);

        $tablausuario->update($request->all());

        return redirect()->route('tablausuarios.index')
            ->with('success', 'Tablausuario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tablausuario = Tablausuario::find($id)->delete();

        return redirect()->route('tablausuarios.index')
            ->with('success', 'Tablausuario deleted successfully');
    }
}
