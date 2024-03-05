<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    public function index()
    {

        $teacher = User::where('role', 'teacher')->paginate(4);
        return view('sections.teachers.index', compact('teacher'));

    }

    public function show($id)
    {

    }

    public function create()
    {
        return view('sections.teachers.create');

    }

    public function store(Request $request)
    {
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'rut' => $request->input('rut'),
            'password' => bcrypt($request->input('password')),
            'role' =>'teacher'
        ]);
        return to_route('teacher.index');
    }

    public function edit($id)
    {
        $teacher = User::find($id);
        return view('sections.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, String $id)
    {
        $teacher  = User::find($id);
        $teacher->update([
           'first_name' => $request->input('first_name'),
           'last_name' => $request->input('last_name'),
           'email' => $request->input('email'),
           'rut' => $request->input('rut'),
           'password' => bcrypt($request->input('password'))

       ]);
       /*to_route : redirecciones de una forma más limpia */
       return to_route('teacher.index');
    }

    public function destroy(String $id)
    {
        $teacher = User::find($id);
        $teacher->delete();

        return to_route('teacher.index');
    }
}
