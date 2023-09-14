<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Research;
use App\Models\Department;
use App\Models\Contact;
use App\Models\Staff;
use App\Models\Course;
use DB;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $department = Department::all();
        $staff=Staff::latest()->get();
        return view('frontend.index',compact('department','staff'));
    }

    /**
     * Show aboute page
     */
    public function about()
    {
        //
        return view('frontend.about');

    }

    /**
     * show contact page
     */
    public function contact()
    {

        return view('frontend.contact');
    }

   

    /**
     * show department individualy
     */
    public function department($id)
    {
        //
        $department= Department::find($id);

        $teacher = DB::table('teachers')
        ->select('*')->orderBy('updated_at')
        ->where('department_id', $department->id)->paginate(9);
        
        return view('frontend.department', compact('department','teacher'));
    
    }

    /**
     * show teacher invidualy
     */
    public function teacher()
    {
        //
    }

    /**
     * reserarch Method  
     */
    public function research()
    {
        //
         
        $research=Research::latest()->paginate(8);

        // catigory news
        $research_count = Research::select(DB::raw('department_id, COUNT(*) as count'))
                           ->groupBy('department_id')
                           ->get();

        
        return view('frontend.research',compact('research','research_count'));
    }
    /**
     * show research
     */
    public function research_show ($id)
    {
        $research_count = Research::select(DB::raw('department_id, COUNT(*) as count'))
        ->groupBy('department_id')
        ->get();

        $research=Research::find($id);
        return view('frontend.research_show',compact('research','research_count'));
    }

    /**
     * download research
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
     * Show
     */
    public function destroy(string $id)
    {
        //
    }

     /**
     * contact store
     */
    public function contactstore(Request $request)
    {

        $request->validate([
            'name'=>'required|string|max:100',
            'lname'=>'required|string|max:100',
            'email'=>'required|email|max:100',
            'message'=>'required|string',

        ]);
        
        $contact=new Contact();
        $contact->name=$request->input('name');
        $contact->lname=$request->input('lname');
        $contact->email=$request->input('email');
        $contact->messge=$request->input('message');
        $contact->save();
        return redirect()->back();
    }
    /**
     * contact delete
    */
 
}

