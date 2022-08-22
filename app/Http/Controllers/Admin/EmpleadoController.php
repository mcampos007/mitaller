<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class EmpleadoController extends Controller
{
    //
    public function index()
    {
       // $empleados = User::empleados()->get();
         $empleados = User::empleados()->paginate(10);
        return view('empleados.index',compact('empleados'));       
    }

    public function create()
    {
        //

        return view('empleados.create');
    }

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
                'role' => 'empleado',
                'password' => bcrypt($request->input('password'))
            ]
        );

        $notification = "El empleado se ha registrado correctamente.";
        return redirect('/empleados')->with(compact('notification'));
    }

    public function edit($id)
    {
        //
        $empleado = User::Empleados()->findOrFail($id);
        return view('empleados.edit',compact('empleado'));
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

        $user = User::empleados()->findOrFail($id);

        $nombreEmpleado = $user->name;
        $data = $request->only('name', 'email', 'dni', 'address', 'phone');
        $password =  $request->input('password');

        if ($password)
            $data += ['password' => bcrypt($password)];

        $user->fill($data);
        $user->save();

        

        $notification = "El empleado $nombreEmpleado se ha actualizado correctamente.";

        return redirect('/empleados')->with(compact('notification'));
    }

    public function destroy(User $empleado)
    {
        //
        $empleadoName = $empleado->name;

        $empleado->delete();

        $notification = "El empleado $empleadoName se ha eliminado correctamente.";

        return redirect('/empleados')->with(compact('notification'));
    }
    
}
