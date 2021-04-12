@extends('layouts.base')

@section('content')
  <div class="container">

    <h1 class="text-center">EDIT COURSE {{$course->id}}</h1>

    <div class="row">
      <a class="btn" href="/courses">Back to Index</a>
      <form class="row" action="/courses/{{$course->id}}" method="post">
        @method('PUT')
        @csrf
        <div class="form-floating mb-3 col-6">
          <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{old('name',$course->course_name)}}" >
          <label for="floatingInput">Nombre del Curso</label>
        </div>

        <div class="form-floating mb-3 col-6">
          <input type="number" class="form-control" id="ranking" name="ranking" min="1" max="5" list="rank" value="{{old('ranking',$course->course_ranking)}}" >
          <label for="floatingPassword">Ranking del Curso 1 al 5 </label>
        </div>

        <div class="form-floating mb-3 col-6">
          <input type="text" class="form-control" id="teacher" name="teacher" placeholder="" value="{{old('teacher',$course->course_teacher)}}" >
          <label for="floatingInput">Nombre del Tutor</label>
        </div>

        <div class="form-floating mb-3 col-6">
          <select class="form-select " name="status" aria-label="Seleccione" required>
            <!-- <option selected>Seleccione</option> -->
            <option>{{old('status',$course->course_status)}}</option>
            <option value="Estreno">ESTRENO</option>
            <option value="Estable">ESTABLE</option>
            <option value="Antiguo">ANTIGUO</option>
          </select>
          <label for="floatingInput">Status del Curso</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
@endsection
