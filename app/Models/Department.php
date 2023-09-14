<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class Department extends Model
{
    protected $guarded=[];
    use HasFactory;
   
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
   
    public function research()
    {
        return $this->hasMany(Research::class);
    }
    
    public function course()
    {
        return $this->hasMany(Course::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Listen for the deleting event
        static::deleting(function ($department) {
            // Delete related images of teachers
            $department->teachers->each(function ($teacher) {
                // Assuming 'image' is the name of the image column in the teachers table
                if (!empty($teacher->image)) {
                    $imagePath = public_path('images/teacher/' . $teacher->image);
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }
            });

            // Delete related images of courses
            $department->course->each(function ($course) {
                // Assuming 'image' is the name of the image column in the courses table
                if (!empty($course->image)) {
                    $imagePath = public_path('images/course/' . $course->image);
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }
            });

            $department->research->each(function ($research) {
                if (!empty($research->image)) {
                    $imagePath = public_path('images/research/' . $research->image);
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }
    
                if (!empty($research->file)) {
                    $filePath = public_path('storage/files/research/' . $research->file);
                    if (File::exists($filePath)) {
                        File::delete($filePath);
                    }
                }
            });

          
        });


        
    }


}
