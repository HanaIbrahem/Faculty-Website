<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Validation\Rules\File;
use DB;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $department=Department::all();
        $departmentcount=Department::all()->count();
        return view('admin.department',compact('department','departmentcount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('admin.department_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => ['required', File::image()],
            'detail' => 'required|string',
        ]);

        // Create a new department instance
        $department = new Department();
        $department->name = $request->input('name');
        $department->description = $request->input('detail');

        $image = $request->file('image');
        $name_gen = $request->input('name').hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

        $image->move(public_path('images/department/'), $name_gen);
        $department->image =$name_gen;

        // Save the department record to the database
        $department->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
 
        $departmentId = $id; // Replace 1 with the desired department_id

        $teachers = DB::table('teachers')
            ->select('*')
            ->where('department_id', $departmentId)
            ->get();
        $department=Department::find($id);
        return view('admin.department_show',compact('department','teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $department=Department::find($id);

        return view('admin.department_edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //


        $department = Department::find($request->id);

        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
        ]);

        if ($request->hasFile('image')) {


            $request->validate([
                'image' => ['required', File::image()],
            
            ]);

            if ($department->image != null) {
                $img = 'images/department/'.$department->image;
                unlink($img);

            }
           
    

            $image = $request->file('image');
            $name_gen =$request->input('name'). hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            $image->move(public_path('images/department/'), $name_gen);
            $department->image=$name_gen;
        }

        $department->name = $request->input('name');
        $department->description = $request->input('detail');

        // Save the changes
        $department->save();

        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $department=Department::find($id);
        
        unlink('images/department/'.$department->image);
        $department->delete();
        return redirect()->back();
    }
}
