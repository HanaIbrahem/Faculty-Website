<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use Illuminate\Validation\Rules\File;
use DB;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $admission=Admission::all();
        return view('admin.admission',compact('admission'));
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
            $request->validate([
            'name' => 'required|string|max:255',
            'name_ku' => 'required|string|max:255',

            'image' => ['required', File::image()],
            'detail' => 'required|string',
            'detail_ku' => 'required|string',

        ]);

        // Create a new admission instance
        $admission = new Admission();
        $admission->name = $request->input('name');
        $admission->description = $request->input('detail');

        $admission->name_ku = $request->input('name_ku');
        $admission->description_ku = $request->input('detail_ku');

        
        $image = $request->file('image');
        $name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

        $image->move(public_path('images/admission/'), $name_gen);
        $admission->image =$name_gen;

        // Save the admission record to the database
        $admission->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $admission=Admission::find($id);
        return view('admin.admission-show',compact('admission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $admission=Admission::find($id);

        return view('admin.admission_edit',compact('admission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $admission = Admission::find($request->id);

        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string',

            'name_ku' => 'required|string|max:255',
            'detail_ku' => 'required|string',
        ]);

        if ($request->hasFile('image')) {


            $request->validate([
                'image' => ['required', File::image()],
            
            ]);

            if ($admission->image != null) {
                $img = 'images/admission/'.$admission->image;
                unlink($img);

            }
           
    

            $image = $request->file('image');
            $name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            $image->move(public_path('images/admission/'), $name_gen);
            $admission->image=$name_gen;
        }

        $admission->name = $request->input('name');
        $admission->description = $request->input('detail');

        $admission->name_ku= $request->input('name_ku');
        $admission->description_ku= $request->input('detail_ku');
        // Save the changes
        $admission->save();

        return redirect()->route('admission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $admission=Admission::find($id);
        
        unlink('images/admission/'.$admission->image);
        $admission->delete();
        return redirect()->back();
    }
}
