@extends('layouts.app')
@section('content')
    <h1>Profesores</h1>
    <div>
        <div>
            <a href="{{route('teacher.create')}}" class="btn btn-success mt-3">
                <i class="bi bi-file-earmark-plus"> Agregar Profesores </i>
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
             @foreach ($teacher as $teacher)
                <tr>
                    <th scope="row">{{ $teacher->first_name }}</th>
                    <th scope="row">{{ $teacher->last_name }}</th>
                    <th scope="row">{{ $teacher->rut }}</th>
                    <th scope="row">{{ $teacher->email }}</th>
                    <td>
                        <a class="btn btn-sm btn-default" href="{{ route('teacher.edit', $teacher->id) }}"><i class="bi bi-pencil-square"></i></a>
                        <form class="d-inline" action="{{ route('teacher.destroy', $teacher->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-default" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $teachers->links('vendor.pagination.bootstrap-5') }} --}}

 @endsection
