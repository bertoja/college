<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'admin')->orderBy('first_name','asc')->paginate(4);
        return view('sections.users.index', compact('users'));
    }

    public function show($id)
    {
        // Tu lógica para mostrar un usuario específico
    }

    public function create()
    {
         return view('sections.users.create');

    }

    public function store(StoreRequest $request)
    {
         User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'rut' => $request->input('rut'),
            'password' => bcrypt($request->input('password')),
            'role' =>'admin'
        ]);
        return to_route('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        //dd($user);
        return view('sections.users.edit', compact('user'));
    }

    public function update(Request $request, String $id)
    {
        $user  = User::find($id);
         $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'rut' => $request->input('rut'),
            'password' => bcrypt($request->input('password'))

        ]);
        return to_route('user.index');

    }

    public function destroy(String $id)
    {
        $user = User::find($id);
        $user->delete();

        return to_route('user.index');

    }
}
