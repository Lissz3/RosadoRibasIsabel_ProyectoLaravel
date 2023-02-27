<?php

namespace App\Http\Controllers;

use App\Models\Tablageneral;
use Illuminate\Http\Request;

/**
 * Class TablageneralController
 * @package App\Http\Controllers
 */
class TablageneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tablagenerals = Tablageneral::paginate();

        return view('tablageneral.index', compact('tablagenerals'))
            ->with('i', (request()->input('page', 1) - 1) * $tablagenerals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tablageneral = new Tablageneral();
        return view('tablageneral.create', compact('tablageneral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tablageneral::$rules);

        Tablageneral::create($request->all());

        return redirect()->route('tablageneral.index')
            ->with('success', 'Tablageneral created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tablageneral = Tablageneral::find($id);

        return view('tablageneral.show', compact('tablageneral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tablageneral = Tablageneral::find($id);

        return view('tablageneral.edit', compact('tablageneral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tablageneral $tablageneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tablageneral $tablageneral)
    {
        request()->validate(Tablageneral::$rules);

        $tablageneral->update($request->all());

        return redirect()->route('tablageneral.index')
            ->with('success', 'Tablageneral updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tablageneral = Tablageneral::find($id)->delete();

        return redirect()->route('tablageneral.index')
            ->with('success', 'Tablageneral deleted successfully');
    }
}
