<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Contact;

use Illuminate\Validation\Rules\File;

class WebsiteController extends Controller
{
    public function Dashbord(){

        $department=Department::all()->count();
        $teacher=Teacher::all()->count();
        $user=User::all()->count();

        $faculty=Faculty::find(1);

        $info=[
            'department'=>$department,
            'teacher'=>$teacher,
            'user'=>$user,
        ];
        $contact=Contact::latest()->get();


        $i=1;
        return view('admin.index',compact('i','info','faculty','contact'));
    }
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

            'name_ku' => 'required|string|max:255',
            'title_ku' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {


            $request->validate([
                'image' => ['required', File::image()],
            
            ]);

            if ($faculty->logo != null) {
                $img = 'images/'.$faculty->logo;
                // unlink($img);

            }
           
    

            $image = $request->file('image');
            $name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            $save_url = $name_gen;

            $image->move(public_path('images/'), $name_gen);
            
            $faculty->logo=$save_url;
        }

        $faculty->name=$request->input('name');
        $faculty->title=$request->input('title');

        $faculty->name_ku=$request->input('name_ku');
        $faculty->title_ku=$request->input('title_ku');
        // Save the changes
        $faculty->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function contactdelete(string $id)
    {
        //
        $contact=Contact::find($id);
        $contact->delete();
        return redirect()->back();

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
            'detail_ku' => 'required|string',

        ]);

        // Find the faculty by ID

        // Update the faculty information
        $faculty->description = $request->input('detail');
        $faculty->description_ku= $request->input('detail_ku');

        // Upload and store the image
        if ($request->hasFile('image')) {


            $request->validate([
                'image' => ['required', File::image()],
            
            ]);

            if ($faculty->image != null) {
                $img = 'images/'.$faculty->image;
                // unlink($img);

            }
           
    

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            $save_url = $name_gen;

            $image->move(public_path('images/'), $name_gen);
            
            $faculty->image=$save_url;
        }

        // for uploading cover image 
        if ($request->hasFile('cover')) {


            $request->validate([
                'cover' => ['required', File::image()],
            
            ]);
            $cover = $request->file('cover');
            $name_gen = hexdec(uniqid()).'.'.$cover->getClientOriginalExtension();  // 3434343443.jpg
            $save_url = $name_gen;
            $cover->move(public_path('images/'), $name_gen);

            $faculty->cover=$save_url;
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