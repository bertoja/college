@extends('layouts.app')
@section('content')
    <h1 class="text-center">Nombre Colegio </h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left">
                <h5 class="font-weight-bold">Curso: {{$course->name}}</h5>
            </div>
            <div class="col-md-6 text-right">
                <h5 class="font-weight-bold">Profesor: {{$course->teacher->first_name .' '. $course->teacher->last_name}}</h5>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">Nombre Alumno</th>
                <th scope="col">Rut</th>
                <th scope="col">Correo</th>

            </tr>
        </thead>
        <tbody>
                @foreach ($course->students as $st)
                <tr>
                    <th scope="row">{{ $st->first_name . ' ' . $st->last_name }}</th>
                    <th scope="row">{{ $st->rut }}</th>
                    <th scope="row">{{ $st->email }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $teachers->links('vendor.pagination.bootstrap-5') }} --}}
@endsection
