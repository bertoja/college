@extends('layouts.app')
@section('content')
    <h1>Registro Asignatura</h1>
    <div>
        <div>
            <a href="{{ route('subject.create') }}" class="btn btn-success mt-3">
                <i class="bi bi-file-earmark-plus"> Agregar Asignatura </i>
            </a>
        </div>
    </div>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">Nombre Asignatura</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <th scope="row">{{ $subject->name }}</th>
                    <td>
                        <a class="btn btn-sm btn-default" href="{{ route('subject.edit', $subject->id) }}"><i class="bi bi-pencil-square"></i></a>
                        <form class="d-inline" action="{{ route('subject.destroy', $subject->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-default" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $subjects->links('vendor.pagination.bootstrap-5') }} --}}
@endsection
