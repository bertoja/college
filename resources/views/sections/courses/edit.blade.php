@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('course.update', $courses->id) }}" class="row" method="POST">
            @csrf
            @method('put')
            <div>
                <h1>Actualizar Curso</h1>
            </div>
            <div class="col-4">
                <label for="name" class="form-label">Nombre Curso</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $courses->name) }}">
            </div>
            <div class="col-12">
                <button class="btn btn-sm btn-dark mt-3"> <i class="bi bi-arrow-clockwise"> Actualizar</i></button>
            </div>

        </form>
    </div>
@endsection


