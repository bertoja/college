@extends('layouts.app')
@section('content')
    <h1>Estudiante </h1>
    <div>
        <div>
            <a href="{{ route('student.create') }}" class="btn btn-success mt-3">
                <i class="bi bi-file-earmark-plus"> Agregar Estudiante </i>
            </a>
        </div>
    </div>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Rut</th>
                <th scope="col">Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $student->first_name }}</th>
                    <th scope="row">{{ $student->last_name }}</th>
                    <th scope="row">{{ $student->rut }}</th>
                    <th scope="row">{{ $student->email }}</th>
                    <td>
                        <a class="btn btn-sm btn-default" href="{{ route('student.edit', $student->id) }}"><i class="bi bi-pencil-square"></i></a>
                        <form class="d-inline" action="{{ route('student.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-default" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $students->links('vendor.pagination.bootstrap-5') }} --}}
@endsection
