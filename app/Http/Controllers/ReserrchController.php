<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use DB;
use App\Models\Research;

class ReserrchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $research = Research::latest()->get();
        $i=1;
        return view('admin.reserch',compact('research','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $depart=Department::all();
        return view('admin.research_create',compact('depart'));
    }

    /**
     * function for download pdf file
     */

    public function download($filename)
    {
        $file = storage_path("app/public/files/research/$filename");
    
        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|string|max:255',
            'name_ku'=>'required|string|max:255',

        
            'auther'=>'required|string',
            'auther_ku'=>'required|string',
            'file' => 'required|mimes:pdf,doc,docx',

            'description'=>'required|string',
            'description_ku'=>'required|string',
            
            'image'=>['required',File::image()],

            'department'=>'required|exists:departments,id',
        ]);


        $research=new Research();

        $research->name=$request->input('name');
        $research->name_ku=$request->input('name_ku');

        $research->description=$request->input('description');
        $research->description_ku=$request->input('description_ku');

        $research->auther=$request->input('auther');
        $research->auther_ku=$request->input('auther_ku');
        $research->department_id=$request->input('department');

        // for image upload
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
        $image->move(public_path('images/research/'), $name_gen);
        $research->image =$name_gen;



        // for PDF or DOC file upload
        $file = $request->file('file');
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/files/research', $file_name);
        $research->file = $file_name;

        $research->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $research=Research::find($id);
        return view('admin.research_show',compact('research'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $research = Research::find($id);
        $depart=Department::all();

        return view('admin.reserch_edit',compact('research','depart'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|string|max:255',
            'name_ku'=>'required|string|max:255',
            'auther'=>'required|string',
            'auther_ku'=>'required|string',
            'description'=>'required|string',
            'description_ku'=>'required|string',
            'department'=>'required|exists:departments,id',

        ]);

        $research=Research::find($request->id);

        $research->name=$request->input('name');
        $research->name_ku=$request->input('name_ku');

        $research->description=$request->input('description');
        $research->description_ku=$request->input('description_ku');

        $research->auther=$request->input('auther');
        $research->auther_ku=$request->input('auther_ku');
        $research->department_id=$request->input('department');


        // if request has image file 
        if ($request->hasFile('image')) {

            $request->validate([
                'image'=>['required',File::image()],
            ]);
            // unlink('images/research/'.$research->image);

            $image = $request->file('image');
            $name_gen = time().'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            $image->move(public_path('images/research/'), $name_gen);
            $research->image =$name_gen;
        }

        // if request hase pdf file 
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf,doc,docx',
            ]);
            // unlink('storage/files/research/'.$research->file);

            $file = $request->file('file');
            $file_name = $request->input('name') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/files/research', $file_name);
            $research->file = $file_name;
    

        }

        $research->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $research = Research::find($id);

        // unlink('storage/files/research/'.$research->file);
        // unlink('images/research/'.$research->image);
        $research->delete();
        return redirect()->back();

    }
}
