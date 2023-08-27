<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        return view('frontend.index');
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
    public function department()
    {
        //
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
