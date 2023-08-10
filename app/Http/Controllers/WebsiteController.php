<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Validation\Rules\File;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $faculty=Faculty::find(1);
        return view('admin.website',compact('faculty'));
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
        $faculty = Faculty::find(1);

        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {


            $request->validate([
                'image' => ['required', File::image()],
            
            ]);

            if ($faculty->logo != null) {
                $img = 'images/'.$faculty->logo;
                unlink($img);

            }
           
    

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            $save_url = $name_gen;

            $image->move(public_path('images/'), $name_gen);
            
            $faculty->logo=$save_url;
        }

        $faculty->name=$request->input('name');
        $faculty->title=$request->input('title');

        // Save the changes
        $faculty->save();

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
    public function edit()
    {
        //
        $faculty = Faculty::find(1);
        return view('admin.faculty', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $faculty = Faculty::find(1);

        // Validate the input data
        $request->validate([
            'detail' => 'required|string',
        ]);

        // Find the faculty by ID

        // Update the faculty information
        $faculty->description = $request->input('detail');

        // Upload and store the image
        if ($request->hasFile('image')) {


            $request->validate([
                'image' => ['required', File::image()],
            
            ]);

            if ($faculty->image != null) {
                $img = 'images/'.$faculty->image;
                unlink($img);

            }
           
    

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            $save_url = $name_gen;

            $image->move(public_path('images/'), $name_gen);
            
            $faculty->image=$save_url;
        }

        // Save the changes
        $faculty->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}