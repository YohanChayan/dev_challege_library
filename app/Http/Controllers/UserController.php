<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('books')->where('role', '!=', 'admin')->paginate(5);

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^([^0-9]*)$/', //no numbers
            'email' => 'required|unique:users,email',
        ]);

        $newUser = new User();

        $hard_password = bcrypt(bcrypt('1qwsdc6yhjiopl')); //avoid unnecessary access

        $newUser->name = $request->input('name');
        $newUser->email = $request->input('email');
        $newUser->password = $hard_password;
        $newUser->role = 'none';
        $newUser->save();
        
        Alert::toast('Nuevo usuario añadido correctamente!', 'success');
        return redirect('users');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if(!is_null($user))
            return view('users.create-edit')->with('user', $user);
        else{
            Alert::toast('Recurso no encontrado!', 'error');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|regex:/^([^0-9]*)$/',
            'email' => 'required|unique:users,email',
        ]);

        $user = User::find($id);

        if(isset($user)){
            $user->fill( $request->except('_token') );
            $user->save();
            Alert::toast('Usuario actualizado correctamente!', 'success');
        }else
            Alert::toast('Recurso no encontrado!', 'error');

        return redirect('users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(isset($id)){
            $user = User::find($id);
            if(count($user->books) > 0)
                Alert::toast('Este usuario posee prestamos!', 'error');
            else{
                $user->delete();
                Alert::toast('Usuario eliminado correctamente!', 'success');
            }

        }else
            Alert::toast('Recurso no encontrado!', 'error');

        return redirect('users');
    }
}
