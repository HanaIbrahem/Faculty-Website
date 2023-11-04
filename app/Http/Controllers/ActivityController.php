<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Validation\Rules\File;
use DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $activity=Activity::all();
        $i=1;
        return view('admin.activity',compact('activity','i'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.activity_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
                'name'=>'required|string|max:200',
                'date'=>'required|date',
                'description'=>'required|string',
                'name_ku'=>'required|string|max:200',
                'image'=>['required',File::image()],
                'description_ku'=>'required|string',
        ]);
        $activity= new Activity();
        $activity->name=$request->input('name');
        $activity->name_ku=$request->input('name_ku');
        $activity->description=$request->input('description');
        $activity->description_ku=$request->input('description_ku');
        $activity->date=$request->input('date');
        $image = $request->file('image');
        $name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
        $image->move(public_path('images/activity/'), $name_gen);
        $activity->image=$name_gen;
        $activity->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $activity=Activity::find($id);
        return view('admin.activity_show',compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $activity=Activity::find($id);
        return view('admin.activity_edit',compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
         $request->validate([
                'name'=>'required|string|max:200',
                'date'=>'required|date',
                'description'=>'required|string',
                'name_ku'=>'required|string|max:200',
                'description_ku'=>'required|string',
        ]);
        $id=$request->input('id');
        $activity=Activity::find($id);
        $activity->name=$request->input('name');
        $activity->name_ku=$request->input('name_ku');
        $activity->description=$request->input('description');
        $activity->description_ku=$request->input('description_ku');
        $activity->date=$request->input('date');
        $image = $request->file('image');

        if ($request->hasFile('image')) {

            $request->validate([
                'image'=>['required',File::image()],

            ]);

            // unlink('images/activity/'.$activity->image);
            $name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            $image->move(public_path('images/activity/'), $name_gen);
            $activity->image=$name_gen;
    
        }

        $activity->save();

      
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $activity=Activity::find($id);
        // unlink('images/activity/'.$activity->image);
        $activity->delete();
        return redirect()->back();


    }
}
