<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\User;


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
        $user = User::paginate(2);
        return view('frontend.department', compact('department','user'));
    
    }

    /**
     * show teacher invidualy
     */
    public function teacher()
    {
        //
    }

    /**
     * Show 
     */
    public function t(string $id)
    {
        //
    }

    /**
     * Show
     */
    public function destroy(string $id)
    {
        //
    }
}
