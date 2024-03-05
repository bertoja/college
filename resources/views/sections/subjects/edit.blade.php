@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('subject.update', $subject->id) }}" class="row" method="POST">
            @csrf
            @method('put')
            <div>
                <h1>Actualizar Asignatura</h1>
            </div>
            <div class="col-4">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $subject->name) }}">
            </div>
            <div class="col-12">
                <button class="btn btn-warning mt-3"> <i class="bi bi-arrow-clockwise"> Actualizar</i></button>
            </div>

        </form>
    </div>
@endsection


