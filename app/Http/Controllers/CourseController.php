<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use DB;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $course=Course::all();
        $department=Department::all();
        $i=1;
        return view('admin.course',compact('course','department','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $department=Department::find($id);
        return view('admin.course_create',compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate(
            [
                'name'=>'required|string|max:200',
                'description'=>'required|string',
                'image'=>['required',File::image()],
                'name_ku'=>'required|string|max:200',
                'description_ku'=>'required|string',
                'cts'=>'required',
                'department_id'=>'exists:departments,id|required',
                'type'=>'required',

            ]
        );

        $course= new Course();
        $course->name=$request->input('name');
        $course->name_ku=$request->input('name_ku');
        $course->description=$request->input('description');
        $course->description_ku=$request->input('description_ku');
        $course->cts=$request->input('cts');
        $course->type=$request->input('type');
        $course->department_id=$request->input('department_id');

        // indesrt image
        $image=$request->file('image');
        $namegen=$request->input('name').hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/course/'),$namegen);
        $course->image=$namegen;
        $course->save();

     

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $course=Course::find($id);
        $department=Department::find($course->department_id);
        return view('admin.course_show',compact('course','department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $course=Course::find($id);
        $department=Department::find($course->department_id);
        return view('admin.course_update',compact('course','department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate(
            [
                'name'=>'required|string|max:200',
                'description'=>'required|string',
                'name_ku'=>'required|string|max:200',
                'description_ku'=>'required|string',
                'cts'=>'required',
                'type'=>'required',

            ]
        );

        $course=Course::find($request->input('id'));
        $course->name=$request->input('name');
        $course->name_ku=$request->input('name_ku');
        $course->description=$request->input('description');
        $course->description_ku=$request->input('description_ku');
        $course->cts=$request->input('cts');
        $course->type=$request->input('type');

        // indesrt image
        if ($request->hasFile('image')) {
            $request->validate([
                'image'=>['required',File::image()],

            ]);
            unlink('images/course/'.$course->image);
            $image=$request->file('image');
            $namegen=$request->input('name').hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/course/'),$namegen);
            $course->image=$namegen;
        }
      
        $course->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $course=Course::find($id);
        unlink('images/course/'.$course->image);
        $course->delete();
        return redirect()->back();

    }
}
