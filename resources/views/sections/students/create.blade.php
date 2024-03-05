@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('student.store') }}" class=" " method="POST">
                    <h1>Registro Estudiantes </h1>
                    @csrf <!--obligatorio en todos los formularios -->
                    <div class="row">
                        <div class="col-4">
                            <label for="first_name" class="form-label">Nombre</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                id="first_name" name="first_name" value="{{ old('first_name') }}">
                            @error('first_name')
                                @include ('common.validation-error')
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="last_name" class="form-label">Apellido</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                id="last_name" name="last_name" value="{{ old('last_name') }}">
                            @error('last_name')
                                @include ('common.validation-error')
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            @error('password')
                                @include('common.validation-error')
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="rut" class="form-label">Rut</label>
                            <input type="text" class="form-control @error('rut') is-invalid @enderror" id="rut"
                                name="rut" oninput="checkRut(this)" maxlength="10">
                            @error('rut')
                                @include('common.validation-error')
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email">
                            @error('email')
                                @include('common.validation-error')
                            @enderror
                        </div>
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
