@extends('layouts.base')

@section('content')
  <div class="container">

    <h1 class="text-center">CREATE COURSE</h1>

    <div class="row">
      <a class="btn" href="/courses">Back to Index</a>

      @if($errors->any())
        <div class="">
          <div class="alert alert-danger" role="alert">
            <!-- A simple danger alert—check it out! -->
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        </div>
      @endif

      <form class="row" action="/courses" method="post">
        @csrf
        <div class="form-floating mb-3 col-6">
          <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{old('name')}}">
          <label for="floatingInput">Nombre del Curso</label>
        </div>

        <div class="form-floating mb-3 col-6">
          <input type="number" class="form-control" id="ranking" name="ranking" value="{{old('ranking')}}" >
          <label for="floatingPassword">Ranking del Curso 1 al 5 </label>
        </div>

        <div class="form-floating mb-3 col-6">
          <input type="text" class="form-control" id="teacher" name="teacher" placeholder="" value="{{old('teacher')}}">
          <label for="floatingInput">Nombre del Tutor</label>
        </div>

        <div class="form-floating mb-3 col-6">
          <select class="form-select " name="status" aria-label="Seleccione" >
            <!-- <option selected>Seleccione</option> -->
            <option selected value="Estreno">ESTRENO</option>
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
