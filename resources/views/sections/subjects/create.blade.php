@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('subject.store') }}" class=" " method="POST">
                    <h1>Registro Asignatura </h1>
                    @csrf <!--obligatorio en todos los formularios -->
                    <div class="row">
                        <div class="col-4">
                            <label for="name" class="form-label">Nombre Asignatura</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                @include ('common.validation-error')
                            @enderror
                        </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary"> <i class="bi bi-plus-circle"> Guardar</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

