<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Course::all();
        return view('courses.index',[
          //'courses' => Course::all()
          'courses' => Course::OrderBy('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        // var_dump($request->all());
        // die;
        // $request->validate([
        //   'name' => 'required',
        //   'ranking' => ['required','gte:1','lte:5']
        // ],[
        //   'name.required' => 'Alerta el campo Nombre es necesario'
        // ]);

        $course = new Course();
        $course->course_name = $request->name;
        $course->course_ranking = $request->ranking;
        $course->course_teacher = $request->teacher;
        $course->course_status = $request->status;

        $course->save();
        return redirect('/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /*type hinting
    public function edit($id)
    Inyeccion de dependencias
    */
    public function edit(Course $course)
    {
        /*type hinting
        $course =Course::findOrFail($id);*/


        return view('courses.edit',[
          'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);

        $course->course_name = $request->name;
        $course->course_ranking = $request->ranking;
        $course->course_teacher = $request->teacher;
        $course->course_status = $request->status;

        $course->save();
        return redirect('/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return back();
    }
}
