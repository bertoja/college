@extends('layouts.app')
@section('content')
    <h1>Administrador</h1>
    <div>
        <div>
            <a href="{{ route('user.create') }}" class="btn btn-success">
                <i class="bi bi-file-earmark-plus"> Agregar Administrador </i>
            </a>
        </div>
    </div>
    <table class="table table-bordered table-striped mt-3" >
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
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->first_name }}</th>
                    <th scope="row">{{ $user->last_name }}</th>
                    <th scope="row">{{ $user->rut }}</th>
                    <th scope="row">{{ $user->email }}</th>
                    <td>
                        {{-- <a class="btn btn-sm btn-default" href=""><i class="bi bi-pass"></i></a> --}}

                        <a class="btn btn-sm btn-default" href="{{ route('user.edit', $user->id) }}"><i class="bi bi-pencil-square"></i></a>

                        <form class="d-inline" action="{{ route('user.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-default" type="submit"><i class="bi bi-trash"></i></button>
                         </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links('vendor.pagination.bootstrap-5') }}
@endsection
