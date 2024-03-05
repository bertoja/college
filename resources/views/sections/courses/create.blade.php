@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('course.store') }}" class=" " method="POST">
                    <h1>Registro Cursos </h1>
                    @csrf <!--obligatorio en todos los formularios -->
                    <div class="row">
                        <div class="col-6">
                            <label for="name" class="form-label">Nombre Cursos</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                @include ('common.validation-error')
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="teacher_id" class="form-label">Profesor</label>
                            <select class="form-control  @error('teacher_id') is-invalid @enderror" name="teacher_id" id="teacher_id">
                                <option value="">Seleccione...</option>
                                @foreach ($teachers  as $teacher )
                                    <option value="{{$teacher->id}}">{{$teacher->first_name .' '. $teacher->last_name}}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                @include ('common.validation-error')
                            @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="students" class="form-label">Alumnos</label>
                            <select class="form-control  @error('students') is-invalid @enderror" name="students[]" id="students" multiple>
                                @foreach ($students  as $student )
                                    <option value="{{$student->id}}">{{$student->first_name .' '. $student->last_name}}</option>
                                @endforeach
                            </select>
                            @error('students')
                                @include ('common.validation-error')
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
