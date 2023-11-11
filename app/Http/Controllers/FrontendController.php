<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Admission;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Research;
use App\Models\Department;
use App\Models\Contact;
use App\Models\Staff;
use App\Models\Course;
use DB;


class FrontendController extends Controller
{
    public function index()
    {
        //
        $department = Department::all();
        $staff = Staff::orderBy('pin', 'desc')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('frontend.index', compact('department', 'staff'));
    }

    /**
     * Show aboute page
     */
    public function about()
    {
        //
        $activity = Activity::latest()->paginate(8);
        return view('frontend.about', compact('activity'));

    }
    /**
     * activity show
     */

    public function show($id)
    {
        $activity = Activity::find($id);
        return view('frontend.activity', compact('activity'));
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
        $department = Department::find($id);

        $teacher = DB::table('teachers')
            ->select('*')
            ->orderBy('pin', 'desc')
            ->orderBy('updated_at', 'desc')
            ->where('department_id', $department->id)
            ->paginate(12); // Added 'teacher_page' as the pagination name

        $courses = DB::table('courses')
            ->select('*')
            ->orderBy('updated_at')
            ->where('department_id', $department->id)
            ->paginate(9); 

        $type="all";
        return view('frontend.department', compact('department', 'courses','teacher','type'));


    }

    /**
     * course filter
     */

    public function filterCourses($id, $type)
    {
        $department = Department::find($id);

        $teacher = DB::table('teachers')
            ->select('*')
            ->orderBy('pin', 'desc')
            ->orderBy('updated_at', 'desc')
            ->where('department_id', $department->id)
            ->paginate(12);






        if ($type == 'bachelor') {
            $selectedType = 'bachelor'; // Replace with the type you want to filter
            $courses = DB::table('courses')
                ->select('*')
                ->orderBy('updated_at')
                ->where('department_id', $department->id)
                ->where('type', $selectedType)
                ->paginate(9);

        } elseif ($type == 'high') {
            $selectedType = 'bachelor'; // Replace with the type you want to filter
            $courses = DB::table('courses')
                ->select('*')
                ->orderBy('updated_at')
                ->where('department_id', $department->id)
                ->where('type', '!=', $selectedType)
                ->paginate(9);
        }


        return view('frontend.department', compact('department', 'teacher', 'courses','type'));
    }


    /**
     * show teacher invidualy
     */
    public function teacher($id)
    {
        //

        $teacher = Teacher::find($id);
        $departmentId = $teacher->department_id;
        $relatedteacher = DB::table('teachers')->select('*')
            ->where('department_id', $departmentId)
            ->where('id', '!=', $id)
            ->orderBy('created_at')
            ->limit(4)->get();

        return view('frontend.teacher', compact('teacher', 'relatedteacher'));
    }

    /**
     * course
     */
    public function course(string $id)
    {
        //

        $course = Course::find($id);
        $departmentId = $course->department_id;
        $relatedcourse = DB::table('courses')->select('*')
            ->where('department_id', $departmentId)
            ->where('id', '!=', $id)
            ->orderBy('created_at')->limit(3)->get();
        return view('frontend.course', compact('course', 'relatedcourse'));

    }

    /**
     * reserarch Method  
     */
    public function research(Request $request)
    {
        //

       
        $research = Research::latest()->paginate(10);

        // catigory news
        $research_count = Research::select(DB::raw('department_id, COUNT(*) as count'))
            ->groupBy('department_id')
            ->get();


        $id=0;
        return view('frontend.research', compact('research', 'research_count','id'));
    }
    /**
     * 
     */
    public function research_catygory($id)
    {

        $research = Research::latest()->where('department_id', $id)->paginate(10);

        // catigory news
        $research_count = Research::select(DB::raw('department_id, COUNT(*) as count'))
            ->groupBy('department_id')
            ->get();

        return view('frontend.research', compact('research', 'research_count','id'));

    }
    /**
     * show research
     */
    public function research_show($id)
    {
        $research_count = Research::select(DB::raw('department_id, COUNT(*) as count'))
            ->groupBy('department_id')
            ->get();

        $research = Research::find($id);
        return view('frontend.research_show', compact('research', 'research_count'));
    }

    /**
     * Admission
     */

    public function admission()
    {

        $admission = Admission::latest()->paginate(9);
        return view('frontend.admission', compact('admission'));
    }

    /**
     * Admission show
     */

    public function admission_show($id)
    {

        $admission = Admission::find($id);
        return view('frontend.admission_show', compact('admission'));
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
     * contact store
     */
    public function contactstore(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:100',
            'lname' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'message' => 'required|string',

        ]);

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->lname = $request->input('lname');
        $contact->email = $request->input('email');
        $contact->messge = $request->input('message');
        $contact->save();
        return redirect()->back()->with('message', 'Message Send successfully!');
    }
    /**
     * contact delete
     */

    


    // Pagination for models


    //get more courses
    public function getMoreTeachers(Request $request)
    {
        $teacher = DB::table('teachers')
        ->select('*')
        ->orderBy('pin', 'desc')
        ->orderBy('updated_at', 'desc')
        ->where('department_id', $request->input('department_id') )
        ->paginate(12); // Added 'teacher_page' as the pagination name

   
        return view('frontend.inc.teacher_data', compact('teacher'))->render();
    }

    public function getMoreCourses(Request $request)
    {
        if ($request->input('type')=='all'){

            $courses = DB::table('courses')
            ->select('*')
            ->orderBy('updated_at')
            ->where('department_id', $request->input('department_id') )
            ->paginate(9); 
        }
        else {
            $type=$request->input('type');
        
            if ($type == 'bachelor') {
                $selectedType = 'bachelor';

                $courses = DB::table('courses')
                ->select('*')
                ->orderBy('updated_at')
                ->where('department_id', $request->input('department_id') )
                ->where('type', $selectedType)
                ->paginate(9);
            }

            elseif ($type == 'high') {
                $selectedType = 'bachelor';

                $courses = DB::table('courses')
                ->select('*')
                ->orderBy('updated_at')
                ->where('department_id', $request->input('department_id') )
                ->where('type', '!=', $selectedType)

                ->paginate(9);
            }


        
        }
     
        return view('frontend.inc.course_data', compact('courses'))->render();
    }


    //get more research
    public function getMoreResearch(Request $request)
    {
        if ($request->ajax()) {

            if ($request->input('department_id')==0){
                $research = Research::latest()->paginate(10);

            }
            else{
                $research = Research::latest()->where('department_id',$request->input('department_id') )->paginate(10);

            }

            return view('frontend.inc.research_data', compact('research'))->render();
        }
    }
    //get more addmision
    public function getMoreAdmission(Request $request)
    {
        $admission = Admission::latest()->paginate(9);

        return view('frontend.inc.admission_data', compact('admission'))->render();
    }

    public function getMoreActivity(Request $request)
    {
        $activity = Activity::latest()->paginate(8);

        return view('frontend.inc.activity_data', compact('activity'))->render();
    }

}