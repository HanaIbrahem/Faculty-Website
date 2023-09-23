<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $staff=Staff::latest()->paginate(8);
        return view('admin.staff',compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
                'rool'=>'required',
                'rool_ku'=>'required|string',
            ]
        );

        $staff= new Staff();
        $staff->name=$request->input('name');
        $staff->name_ku=$request->input('name_ku');
        $staff->description=$request->input('description');
        $staff->description_ku=$request->input('description_ku');
        $staff->rool=$request->input('rool');
        $staff->rool_ku=$request->input('rool_ku');

        $image=$request->file('image');
        $namegen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/staff/'),$namegen);
        $staff->image=$namegen;

        $staff->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $staff=Staff::find($id);
        return view('admin.staff_edit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
          //
          $request->validate(
            [
                'name'=>'required|string|max:200',
                'description'=>'required|string',
                'name_ku'=>'required|string|max:200',
                'description_ku'=>'required|string',
                'rool'=>'required',
                'rool_ku'=>'required|string',
            ]
        );

        $staff=Staff::find($request->input('id'));
        $staff->name=$request->input('name');
        $staff->name_ku=$request->input('name_ku');
        $staff->description=$request->input('description');
        $staff->description_ku=$request->input('description_ku');
        $staff->rool=$request->input('rool');
        $staff->rool_ku=$request->input('rool_ku');

        if ($request->hasFile('image')) {
            # code...
            $request->validate([
                'image'=>['required',File::image()],
            ]);
            unlink('images/staff/'.$staff->image);
            $image=$request->file('image');
            $namegen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/staff/'),$namegen);
            $staff->image=$namegen;
        }
  

        $staff->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $staff=Staff::find($id);
        unlink('images/staff/'.$staff->image);
        $staff->delete();

        return redirect()->back();
    }
}
