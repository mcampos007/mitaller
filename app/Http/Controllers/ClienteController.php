<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $clientes = User::clientes()->get();
         $clientes = User::clientes()->paginate(10);
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('clientes.create');
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
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'nullable|digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];
        //$this->validate($request, $rules, $messages);
        $this->validate($request, $rules);

        User::create(
            $request->only('name', 'email', 'dni', 'address', 'phone') +
            [
                'role' => 'cliente',
                'password' => bcrypt($request->input('password'))
            ]
        );

        $notification = "El cliente se ha registrado correctamente.";
        return redirect('/clientes')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente = User::Clientes()->findOrFail($id);
        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'nullable|digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];
        //$this->validate($request, $rules, $messages);
        $this->validate($request, $rules);

        $user = User::clientes()->findOrFail($id);

        $nombreCliente = $user->name;
        $data = $request->only('name', 'email', 'dni', 'address', 'phone');
        $password =  $request->input('password');

        if ($password)
            $data += ['password' => bcrypt($password)];

        $user->fill($data);
        $user->save();

        

        $notification = "El cliente $nombreCliente se ha actualizado correctamente.";

        return redirect('/clientes')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $cliente)
    {
        //
        $clientName = $cliente->name;

        $cliente->delete();

        $notification = "El cliente $clientName se ha eliminado correctamente.";

        return redirect('/clientes')->with(compact('notification'));
    }
}
