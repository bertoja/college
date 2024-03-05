<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('sections.subjects.index', compact('subjects'));

    }

    public function show($id)
    {
        // Tu lógica para mostrar un usuario específico
    }

    public function create()
    {
        return view('sections.subjects.create');

    }

    public function store(Request $request)
    {
        Subject::create([
            'name'=> $request->input('name')
        ]);
        return to_route('subject.index');
    }

    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('sections.subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);
        $subject->update([
            'name' => $request->input('name'),
        ]);

        return to_route('subject.index');


    }

    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();

        return to_route('subject.index');

    }
}
