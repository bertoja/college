@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('teacher.update', $teacher->id)}}" class="row" method="POST">
        @csrf
        @method('put')
        <div>
            <h1>Actualizar Profesor</h1>
        </div>

        <div class="col-4">
            <label for="first_name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $teacher->first_name) }}">
        </div>
        <div class="col-4">
            <label for="last_name" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $teacher->last_name) }}">
        </div>
        <div class="col-4">
            <label for="rut" class="form-label">Rut</label>
            <input type="text" class="form-control" id="rut" name="rut" oninput="checkRut(this)" maxlength="10" value="{{ old('rut', $teacher->rut) }}">
        </div>
        <div class="col-4">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $teacher->email) }}">
        </div>
        <div class="col-4">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password', $teacher->password) }}">
        </div>
        <div class="col-12">

            <button class="btn btn-warning"> <i class="bi bi-arrow-clockwise"> Actualizar</i></button>
        </div>

    </form>
</div>

@endsection

@section('scripts')
    <script>
        function checkRut(rut) {
            // Despejar Puntos
            var valor = rut.value.replace('.', '');
            // Despejar Guión
            valor = valor.replace('-', '');

            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0, -1);
            dv = valor.slice(-1).toUpperCase();

            // Formatear RUN
            rut.value = cuerpo + '-' + dv
        }
    </script>
@endsection
