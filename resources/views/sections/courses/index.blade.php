@extends('layouts.app')
@section('content')
    <h1>Registro Cursos</h1>

    <div>
        <div>
            <a href="{{ route('course.create') }}" class="btn btn-success mt-3">
                <i class="bi bi-file-earmark-plus"> Agregar Cursos </i>
            </a>
        </div>
    </div>

    <table class="table table-bordered table-striped  mt-3">
        <thead>
             <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre Cursos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{ $course->id }}</th>
                    <th scope="row">{{ $course->name }}</th>
                    {{-- <th scope="row">{{ $course->teacher->first_name .' '. $course->teacher->last_name}}</th> --}}
                    <td>
                        <a class="btn btn-sm btn-default" href="{{ route('course.show', $course->id) }}"><i class="bi bi-pass"></i></a>
                        <a class="btn btn-sm btn-default" href="{{ route('course.edit', $course->id) }}"><i
                                class="bi bi-pencil-square"></i></a>
                        <form class="d-inline" action="{{ route('course.destroy', $course->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-default" type="submit"><i class="bi bi-trash"></i></button>

                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $courses->links('vendor.pagination.bootstrap-5') }}
    {{-- {{ $subjects->links('vendor.pagination.bootstrap-5') }} --}}
@endsection
