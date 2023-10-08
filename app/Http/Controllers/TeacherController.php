<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use DB;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $i=1;
        $department=Department::all();
        $teachers=Teacher::orderBy('pin','desc')
        ->orderBy('updated_at', 'desc')->get();
        return view('admin.teacher',compact('teachers','department','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id)
    {
        //
        $department=Department::find($id);
        return view('admin.teacher_create',compact('department','id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ku' => 'required|string|max:255',

            'image' => ['required', File::image()],
            'description' => 'required|string',
            'description_ku' => 'required|string',

            'department_id' => 'required|exists:departments,id', // Check if the department_id exists in the departments table
        ]);

        // Create a new teacher instance
        $teacher = new Teacher();
        $teacher->name = $request->input('name');
        $teacher->description = $request->input('description');

        $teacher->name_ku = $request->input('name_ku');
        $teacher->description_ku = $request->input('description_ku');

        $teacher->department_id = $request->input('department_id');

        // Upload and store the image (if provided)
        $image = $request->file('image');
        $name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
        $image->move(public_path('images/teacher/'), $name_gen);
        $teacher->image =$name_gen;

        // Save the teacher record to the database
        $teacher->save();
        return redirect()->route('department.show',$request->input('department_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

     

        $teacher=Teacher::find($id);
        // $teachers = DB::table('teachers')
        // ->select('*')
        // ->where('department_id', $departmentId)
        // ->orderBy('updated_at','desc')
        // ->get();
         $department=Department::find($teacher->department->id);
        return view('admin.teacher-show',compact('teacher','department'));
    }
    /**
     * Pin Method
     */

    public function pin($id)
    {
        //
        $teacher=Teacher::find($id);
    
        if ($teacher->pin=='no') {
            $teacher->pin='yes';
        }else{
            $teacher->pin='no';
        }

        $teacher->save();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $teacher=Teacher::find($id);
        $deparement_id=$teacher->department->id;
        $department=Department::find($deparement_id);
        return view('admin.teacher_edit',compact('teacher','department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $teacher=Teacher::find($request->input('id'));

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'name_ku' => 'required|string|max:255',
            'description_ku' => 'required|string',
        ]);

        $teacher->name=$request->input('name');
        $teacher->description=$request->input('description');

        $teacher->name_ku=$request->input('name_ku');
        $teacher->description_ku=$request->input('description_ku');

        if ($request->hasFile('image')) {


            $request->validate([
                'image' => ['required', File::image()],
            
            ]);

            if ($teacher->image != null) {
                $img = 'images/teacher/'.$teacher->image;
                unlink($img);

            }
        
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            $image->move(public_path('images/teacher/'), $name_gen);
            $teacher->image=$name_gen;
        }

        $teacher->save();
        return redirect()->route('department.show',$teacher->department->id);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $teacher=Teacher::find($id);

        unlink('images/teacher/'.$teacher->image);

        $teacher->delete();
        return redirect()->back();
    }
}
