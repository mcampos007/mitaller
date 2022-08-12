<?php

namespace App\Http\Controllers;

use App\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $tecnicos = Tecnico::all();
        return view('tecnicos.index',compact('tecnicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tecnicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages= [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'El nombre debe tener al menos 3 caracteres'
        ];
        $this->validate($request, $rules, $messages);
        $tecnico = new Tecnico;

        $tecnico->name = $request->input('name');
        $tecnico->description = $request->input('description');

        $tecnico->save();

        $notification = "Se registró correctamente el nuevo técnico";
        return redirect('/tecnicos')->with(compact('notification'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnico $tecnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnico $tecnico)
    {
        //
        return view('tecnicos.edit', compact('tecnico'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnico $tecnico)
    {
        //
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages= [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'El nombre debe tener al menos 3 caracteres'
        ];
         $this->validate($request, $rules, $messages);
        // $tecnico = new Tecnico;

        $tecnico->name = $request->input('name');
        $tecnico->description = $request->input('description');

        $tecnico->save();

        $notification ="Los datos del Técnico se han actualizado correctamente.";
        return redirect('/tecnicos')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnico $tecnico)
    {
        //
        $TecnicoDeleted = $tecnico->name;
        $tecnico->delete();
        $notification = "Los datos del Técnico: ".$TecnicoDeleted." Han sido eliminados Correctamente.";
        return redirect('/tecnicos')->with(compact('notification'));
    }
}
