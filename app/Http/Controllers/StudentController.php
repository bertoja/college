<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')->get();
        return view('sections.students.index', compact('students'));
    }

    public function show($id)
    {

    }

    public function create()
    {
        return view('sections.students.create');

    }

    public function store(Request $request)
    {
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'rut' => $request->input('rut'),
            'password' => bcrypt($request->input('password')),
            'role' =>'student'
        ]);
        return to_route('student.index');
    }

    public function edit($id)
    {
        $student = User::find($id);
        return view('sections.students.edit', compact('student'));

    }

    public function update(Request $request, String $id)
    {
        $student  = User::find($id);
        $student->update([
           'first_name' => $request->input('first_name'),
           'last_name' => $request->input('last_name'),
           'email' => $request->input('email'),
           'rut' => $request->input('rut'),
           'password' => bcrypt($request->input('password'))

       ]);
       /*to_route : redirecciones de una forma más limpia */
       return to_route('student.index');
    }

    public function destroy(String $id)
    {
        $student = User::find($id);
        $student->delete();

        return to_route('student.index');
    }
}
