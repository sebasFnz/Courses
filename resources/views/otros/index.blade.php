@extends('layouts.base')

@section('content')
    <div class="container">
      <div class="row">
        <h1>COURSES</h1>
        <a class="btn" href="/courses/create">Create New Course</a>
        <table class="table">
          <thead>
            <tr>
              <th>Nombre Curso</th>
              <th>Ranking</th>
              <th>Nombre Tutor</th>
              <th>Curso Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($courses as $course)
              <tr>
                <td>{{$course->course_name}}</td>
                <td>{{$course->course_ranking}}</td>
                <td>{{$course->course_teacher}}</td>
                <td>{{$course->course_status}}</td>
                <td>
                  <a href="/courses/{{$course->id}}/edit" class="btn btn-outline-success text-center">Edit</a>
                </td>
                <td>
                  <!-- <form action="/courses/{{$course->id}}" method="post"> -->
                  <form action="{{route('courses.destroy',$course)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger text-center" onclick="return confirm('esta seguro de eliminar este curso?')">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
@endsection
