<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Research;
use App\Models\Department;

use Illuminate\Support\Facades\Session;
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
        return view('frontend.index',compact('department'));
    }

    /**
     * Show aboute page
     */
    public function about()
    {
        //
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
         
        $research=Research::latest()->paginate(10);

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
}
