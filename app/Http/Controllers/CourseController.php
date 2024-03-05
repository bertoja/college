<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Course\StoreRequest;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher')->paginate(3);
        return view('sections.courses.index', compact('courses'));
    }

    public function show($id)
    {

        $course = Course::with('students', 'teacher')->find($id);

        return view('sections.courses.show', compact('course'));
    }

    public function create()
    {
        $teachers = User::where('role', 'teacher')->get();
        $students = User::whereDoesntHave('courses')->where('role', 'student')->get();
        return view('sections.courses.create', compact('teachers', 'students'));
    }

    public function store(StoreRequest $request)
    {

        // dd($request ->all());
        $course = Course::create([
            'name' => $request->input('name'),
            'teacher_id' => $request->input('teacher_id')
        ]);
        $course->students()->sync($request->input('students'));

        return to_route('course.index');
    }

    public function edit($id)
    {
        $courses  = Course::find($id);
        return view('sections.courses.edit', compact('courses'));
    }

    public function update(Request $request, String $id)
    {
        $course = Course::find($id);
        $course->update([
            'name' => $request->input('name'),
        ]);
        return to_route('course.index');
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return to_route('course.index');
    }
}
